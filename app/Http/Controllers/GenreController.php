<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::latest()->paginate(10);

        return view('genres_content', compact('genres'))->with('title', 'Жанры');
    }

    public function create()
    {
        return view('genre_create')
            ->with('title', 'Добавить новый жанр');
    }

    public function store(GenreRequest $request, Genre $genre)
    {
        $genre->create($request->validated());
        return redirect()->route('genres.index')->with('status', 'Новый жанр успешно добавлен');
    }


    public function edit(Genre $genre)
    {
        return view('genre_edit', compact('genre'))
            ->with('title', 'Редактирование жанра '.$genre->title);
    }


    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return back()->with('status', $genre->title.'успешно отредактирован');
    }


    public function destroy(Genre $genre)
    {
        $genre->movies()->detach();
        return redirect()->route('genres.index')->with('status', $genre->title.' успешно удален');
    }
}
