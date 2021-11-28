<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::where('status', true)
            ->with('genres')
            ->latest()
            ->paginate(5);
        return MovieResource::collection($movies);

    }


    public function show($id)
    {
        $movie = Movie::where('status', true)
            ->with('genres')
            ->findOrFail($id);
        return new MovieResource($movie);
    }

}
