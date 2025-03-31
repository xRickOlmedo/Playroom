<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function productos()
    {
        return view('productos');
    }

    public function membresias()
    {
        return view('membresias');
    }

    public function blog()
    {
        return view('blog');
    }

    public function contacto()
    {
        return view('contacto');
    }
}
