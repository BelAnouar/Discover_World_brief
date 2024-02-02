<?php

namespace App\Http\Controllers;

use App\Models\Adventure;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adventures = Adventure::with('images', 'destination')->limit(6)->get();
        return view('welcome', ["adventures" => $adventures]);
    }
}
