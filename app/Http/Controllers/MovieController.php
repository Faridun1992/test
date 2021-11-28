<?php

namespace App\Http\Controllers;

use App\Actions\StoreMovieAction;
use App\Actions\UpdateMovieAction;
use App\Http\Requests\MovieStoreRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::where('status', TRUE)->with('genres')->latest()->paginate(10);
        return view('movie_content', compact('movies'))->with('title', 'Фильмы');
    }

    public function create()
    {
        $genres = Genre::orderBy('title')->get();
        return view('movie_create', compact('genres'))->with('title', 'Добавление нового фильма');
    }

    public function store(MovieStoreRequest $request, StoreMovieAction $action)
    {
        $action->handle($request);
        return back()->with('status', 'Новый фильм успешно добавлен');
    }


    public function edit(Movie $movie)
    {
        $movie->load('genres');
        $genres = Genre::orderBy('title')->get();
        return view('movie_edit', compact('movie', 'genres'))->with('title', 'Редактирование фильма ' . $movie->title);
    }

    public function update(MovieStoreRequest $request, Movie $movie, UpdateMovieAction $action)
    {
        $action->handle($request, $movie);
        return back()->with('status', $movie->title . ' успешно редактирован');
    }


    public function destroy(Movie $movie)
    {
        $movie->genres()->detach();
        (File::exists('pink/images/' . $movie->image))
            ? File::delete('pink/images/' . $movie->image) : '';
        $movie->delete();
        return redirect()->route('movies.index')->with('status', 'Фильм успешно удален');
    }

    public function deleteImage($id)
    {
        $movie = Movie::findOrFail($id);
        File::delete('pink/images' . $movie->image);
        $movie->update([
            'image' => null,
        ]);
        return back()->with('status', 'Изоброжение успешно удаленно');
    }
}
