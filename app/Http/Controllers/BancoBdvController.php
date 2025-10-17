<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BancoBdvController extends Controller
{
    /**
     * Mostrar la vista index de banco_bdv
     */
    public function index()
    {
        return view('banco_bdv.index');
    }
}
