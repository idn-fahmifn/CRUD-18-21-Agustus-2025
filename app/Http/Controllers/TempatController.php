<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Tempat;
use Illuminate\Http\Request;

class TempatController extends Controller
{
    public function index()
    {
        $data = Tempat::all();
        return view('tempat.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => ['required', 'string', 'min:5', 'max:30'],
            'kode_ruangan' => ['required', 'string', 'min:5', 'max:30', 'unique:tempat'],
        ]);

        // menyimpan ke database
        Tempat::create([
            'nama_tempat' => $request->nama_tempat,
            'kode_ruangan' => $request->kode_ruangan,
        ]);

        // arahkan ke index
        return back()->with('success', 'Data tempat berhasil ditambahkan');
    }

    public function detail($id)
    {
        $data = Tempat::find($id);
        $barang = Barang::where('tempat_id', $id)->get();
        return view('tempat.detail', compact('data', 'barang'));
    }

    public function update(Request $request, $id)
    {
        // mencari data yang akan diedit
        $data = Tempat::find($id);

        $request->validate([
            'nama_tempat' => ['required', 'string', 'min:5', 'max:30'],
            'kode_ruangan' => ['required', 'string', 'min:5', 'max:30'],
        ]);

        // perintah untuk mengubah data
        $data->update([
            'nama_tempat' => $request->nama_tempat,
            'kode_ruangan' => $request->kode_ruangan,
        ]);

        return back()->with('success', 'Tempat berhasil diubah');

    }

    public function destroy($id)
    {
        $data = Tempat::find($id);
        $data->delete();
        return back()->with('success', 'Tempat berhasil dihapus');
    }


}
