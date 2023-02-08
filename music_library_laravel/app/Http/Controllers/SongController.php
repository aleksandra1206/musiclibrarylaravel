<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\SongResource;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        return $songs;
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
            'title' => 'required|string|max:255',
            'album' => 'required|string|max:255',
            'released_in' => 'required|integer|between:1901,2023',
            'artist_id' => 'required|integer',
            'genre_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $song = Song::create([
            'title' => $request->title,
            'album' => $request->album,
            'released_in' => $request->released_in,
            'artist_id' => $request->artist_id,
            'genre_id' => $request->genre_id,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json([
            'message' => 'Song is created!',
            'song' => new SongResource($song)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show($song_id)
    {
        $song = Song::find($song_id);
        if (is_null($song)) {
            return response()->json('Song not found', 404);
        }
        return response()->json($song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'album' => 'required|string|max:255',
            'released_in' => 'required|integer|between:1901,2023',
            'artist_id' => 'required|integer',
            'genre_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $song->title = $request->title;
        $song->album = $request->album;
        $song->released_in = $request->released_in;
        $song->artist_id = $request->artist_id;
        $song->genre_id = $request->genre_id;

        $song->save();

        return response()->json([
            'message' => 'Song is updated!',
            'song' => new SongResource($song)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return response()->json('Song is deleted');
    }
}
