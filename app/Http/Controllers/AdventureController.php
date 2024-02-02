<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdventureRequest;
use App\Models\Adventure;
use App\Models\destination;
use Illuminate\Http\Request;

class AdventureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $continent = $request->input('continant');
        // $adventures = Adventure::with('images', "destination")->get();

        $adventures = Adventure::with('images', 'destination')->when($continent,  fn ($query, $continent) => $query->byContinent($continent))

            ->paginate(6);
        return view("adventure.index", ["adventures" => $adventures]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdventureRequest $request)
    {
        $data = $request->validated();
        Adventure::create(array_merge($data, ["user_id" => 1]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Adventure $adventure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adventure $adventure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adventure $adventure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adventure $adventure)
    {
        //
    }
}
