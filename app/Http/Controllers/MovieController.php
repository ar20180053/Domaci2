<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\PostDec;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'duration' => 'required|string|max:50',
            'genre_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $movie = Movie::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'genre_id' => $request->genre_id,
            'user_id' => Auth::user()->id
        ]);
        return response()->json(['Movie created successfully!', new MovieResource($movie)]);
    }

    public function index()
    {
        $movies = Movie::all();
        return MovieResource::collection($movies);
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
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return new MovieResource($movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'duration' => 'required|string|max:50',
            'genre_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $movie->name = $request->name;
        $movie->duration = $request->duration;
        $movie->genre_id = $request->genre_id;
        $movie->save();
        return response()->json(['Movie updated successfully!', new MovieResource($movie)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json('Movie deleted successfully!');
    }
}
