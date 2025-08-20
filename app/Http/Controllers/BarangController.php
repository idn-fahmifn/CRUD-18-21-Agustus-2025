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
}
