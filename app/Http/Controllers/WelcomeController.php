<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome.index');
    }

    public function show()
    {
        return view('welcome.show');
    }
}
