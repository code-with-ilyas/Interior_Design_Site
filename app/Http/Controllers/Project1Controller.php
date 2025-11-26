<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Project1Controller extends Controller
{
    public function index() {
        return view('project1'); // Make sure blade file is resources/views/project1.blade.php
    }
}
