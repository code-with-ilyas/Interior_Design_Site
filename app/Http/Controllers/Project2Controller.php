<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Project2Controller extends Controller
{
    public function index() {
        return view('project2'); // Make sure blade file is resources/views/project2.blade.php
    }
}
