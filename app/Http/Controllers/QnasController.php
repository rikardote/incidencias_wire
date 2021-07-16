<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QnasController extends Controller
{
    public function index()
    {
        return view('qnas.index');
    }
}
