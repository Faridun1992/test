<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::where('status', true)
            ->with('genres')
            ->when($request->has('genre'), fn($query) => $query->whereRelation('genres', 'title', $request->genre))
            ->latest()
            ->paginate(10);
        $genres = Genre::orderBy('title')->get();

        return view('filter_content', compact('genres', 'movies'))->with('title', 'Фильтр');

    }

}
