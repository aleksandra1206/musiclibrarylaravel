<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return $artists;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'born' => 'required|integer|between:1850,2020',
            'nationality' => 'required|regex:/^[a-zA-Z\s]*$/'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $artist = Artist::create([
            'name' => $request->name,
            'born' => $request->born,
            'nationality' => $request->nationality,
        ]);

        return response()->json([
            'message' => 'Artist is created',
            'artist' => new ArtistResource($artist)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show($artist_id)
    {
        $artist = Artist::find($artist_id);
        if (is_null($artist)) {
            return response()->json('Artist not found', 404);
        }
        return response()->json($artist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'born' => 'required|integer|between:1850,2020',
            'nationality' => 'required|regex:/^[a-zA-Z\s]*$/'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $artist->name = $request->name;
        $artist->born = $request->born;
        $artist->nationality = $request->nationality;

        $artist->save();

        return response()->json([
            'message' => 'Artist is updated',
            'artist' => new ArtistResource($artist)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return response()->json('Artist is deleted');
    }
}
