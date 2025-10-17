<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BancoTdcController extends Controller
{
    /**
     * Mostrar la vista index de banco_tdc
     */
    public function index()
    {
        return view('banco_tdc.index');
    }
}
