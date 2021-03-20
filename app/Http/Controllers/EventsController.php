<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        return view('events.index');
    }

    public function show($id)
    {
        $data = [
            'id' => $id,
        ];

        return view('events.show')->with($data);
    }
}
