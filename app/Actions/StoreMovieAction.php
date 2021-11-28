<?php

namespace App\Actions;

use App\Http\Requests\MovieStoreRequest;
use App\Models\Movie;

class StoreMovieAction
{
    public function handle(MovieStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('pink\images'), $newImageName);
        }
        $movie = Movie::create([
            'title' => $request->title,
            'image' => $request->has('image') ? $newImageName : null,
            'created_at' => now(),
        ]);
        $movie->genres()->sync($request->genres);
    }
}
