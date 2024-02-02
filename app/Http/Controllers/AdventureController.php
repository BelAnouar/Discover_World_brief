<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdventureRequest;
use App\Models\Adventure;
use App\Models\destination;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdventureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $continent = $request->input('continant');
        $filter = $request->input('filter');
        // $adventures = Adventure::with('images', "destination")->get();

        $adventures = Adventure::with('images', 'destination')->when($continent,  fn ($query, $continent) => $query->byContinent($continent));

        $adventures = match ($filter) {

            'old' => $adventures->oldest(),
            default => $adventures->latest()
        };

        $cacheKey = 'adventures:' . $filter . ':' . $continent;
        $adventures = $adventures->paginate(6);
        // $adventures =
        //     cache()->remember(
        //         $cacheKey,
        //         3600,
        //         fn () =>
        //         $adventures
        //     );





        return view("adventure.index", ["adventures" => $adventures]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $continents = destination::all();
        if (Auth::check()) {

            return view("adventure.create", ["continents" => $continents]);
        } else {

            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdventureRequest $request)
    {
        $data = $request->validated();
        // dd($request->images);
        $result = Adventure::create(array_merge($data, ["user_id" => Auth::id()]));

        if ($request->file('image')) {

            foreach ($request->image as $uploadedImage) {
                $filename = date('YmdHi') . $uploadedImage->getClientOriginalName();
                $uploadedImage->move(public_path('images'), $filename);
                $data['image'] = $filename;
                $image = new Image();
                $image->adventure_id = $result->id;
                $image->image_path  = "images/" . $filename;

                $image->save();
            }
        }

        return redirect("adventure");
    }

    /**
     * Display the specified resource.
     */
    public function show(Adventure $adventure)
    {

        $adventure = Adventure::with('images', 'user')->find($adventure->id);

        return view('adventure.show', ['adventure' => $adventure]);
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
