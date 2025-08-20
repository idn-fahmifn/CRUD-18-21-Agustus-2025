<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempatController extends Controller
{
    public function index()
    {
        return view('tempat.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => ['required', 'string', 'min:5', 'max:30'],
            'kode_ruangan' => ['required', 'string', 'min:5', 'max:30', 'unique:tempat'],
        ]);
    }

}
