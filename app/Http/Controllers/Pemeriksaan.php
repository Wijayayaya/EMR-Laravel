<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pemeriksaan extends Controller
{
    public function index (){
        return view('medis.rekammedis');
    }
    
    public function daftarrekammedis (){
        return view('medis.daftarrekammedis');
    }
}
