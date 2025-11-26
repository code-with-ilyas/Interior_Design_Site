<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Project3Controller extends Controller
{
    public function index() {
        return view('project3'); // Make sure blade file is resources/views/project3.blade.php
    }


}