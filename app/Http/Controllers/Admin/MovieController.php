<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::with('genres')->latest()->paginate(10);
        return view('admin_content', compact('movies'))->with('title', 'управление фильмами');
    }


    public function update($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update(['status' => !$movie->status]);
        return back()->with('status', 'успешно обновлен');
    }

}
