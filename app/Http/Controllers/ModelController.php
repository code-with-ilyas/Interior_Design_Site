<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
     public function model()
    {
        return view('model'); // Loads model.blade.php
    }
}
