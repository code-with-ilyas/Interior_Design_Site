<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignController extends Controller
{
     public function design()
    {
        return view('design'); // loads design.blade.php
    }
}
