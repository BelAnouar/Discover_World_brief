<?php

namespace App\Http\Controllers;

use App\Models\Adventure;
use App\Models\destination;
use App\Models\User;
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
        $countAdventure = Adventure::all()->count();
        $countUser = User::all()->count();
        $countDestination = destination::all()->count();
        $distinations = destination::simplePaginate(6);
        $adventures =
            cache()->remember(
                "adventure",
                3600,
                fn () =>
                $adventures
            );
        return view('welcome', [
            "adventures" => $adventures,    "countAdventure" => $countAdventure,
            "countUser" => $countUser,
            "countDestination" => $countDestination,
            "distinations" => $distinations

        ]);
    }
}
