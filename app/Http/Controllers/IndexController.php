<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [ 
            'title' => 'Inertia page',
            'start_date' => '3.09.2024',
            'description' => 'This page for test!'
        ]);
    }
}
