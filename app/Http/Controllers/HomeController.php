<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        // Sementara kita akan mengirimkan array kosong, nanti akan diisi dengan data foto
        return view('home', ['photos' => []]);
    }
}

