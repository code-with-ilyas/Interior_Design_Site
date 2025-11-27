<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlagController extends Controller
{
    public function index()
    {
        return view('blag'); // resources/views/blag.blade.php
    }
}
