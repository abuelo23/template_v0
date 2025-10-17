<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BancoBtController extends Controller
{
    /**
     * Mostrar la vista index de banco_bt
     */
    public function index()
    {
        return view('banco_bt.index');
    }
}
