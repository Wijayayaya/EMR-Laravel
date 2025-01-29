<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pasien extends Controller
{
    public function index (){
        return view('medis.pasien');
    }
    
    public function daftarpasien (){
        return view('medis.daftarpasien');
    }
}
