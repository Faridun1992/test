<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenreMovieResource;
use App\Http\Resources\GenreResource;
use App\Http\Resources\MovieResource;
use App\Models\Genre;
use App\Models\Movie;

class GenreController extends Controller
{

    public function index()
    {
        return GenreResource::collection(Genre::all());
    }

    public function show($id)
    {
        $movies = Movie::with('genres')
            ->where('status', true)
            ->whereRelation('genres', 'genre_id', $id)
            ->latest()
            ->paginate(5);
        return MovieResource::collection($movies);
    }

}
