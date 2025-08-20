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
        $data = Barang::find($id);
        return view('barang.detail', compact('data'));
    }
}
