<?php

namespace App\Http\Controllers;

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
        return view('tempat.detail', compact('data'));
    }

}
