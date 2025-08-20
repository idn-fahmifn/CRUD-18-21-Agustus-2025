<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Tempat;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        // $data = Barang::all();
        // $tempat =Tempat::all();
        return view('barang.index', [
            'data' => Barang::all(),
            'tempat' => Tempat::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => ['required', 'string', 'min:5', 'max:30'],
            'merk' => ['required', 'string', 'min:5', 'max:30'],
            'harga' => ['required', 'numeric', 'min:100'],
            'tempat_id' => ['required', 'numeric'],
        ]);

        // menyimpan ke database
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'tempat_id' => $request->tempat_id,
        ]);

        // arahkan ke index
        return back()->with('success', 'Data barang berhasil ditambahkan');
    }
    public function detail($id)
    {
        $data = Barang::where('id', $id)->first();

        if ($data) {
            $data = Barang::find($id);
        } else {
            return "Barang tidak ada";
        }

        return view('barang.detail', [
            'data' => $data,
            'tempat' => Tempat::all()
        ]);
    }
    public function update(Request $request, $id)
    {
        // mencari data yang akan diedit
        $data = Barang::find($id);

        $request->validate([
            'nama_barang' => ['required', 'string', 'min:5', 'max:30'],
            'merk' => ['required', 'string', 'min:5', 'max:30'],
            'harga' => ['required', 'numeric', 'min:100'],
            'tempat_id' => ['required', 'numeric'],
        ]);

        // perintah untuk mengubah data
        $data->update([
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'tempat_id' => $request->tempat_id,
        ]);

        return back()->with('success', 'Barang berhasil diubah');

    }

    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return back()->with('success', 'Tempat berhasil dihapus');
    }
}
