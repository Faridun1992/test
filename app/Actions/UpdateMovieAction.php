<?php

namespace App\Actions;

use App\Http\Requests\MovieStoreRequest;
use App\Models\Movie;

class UpdateMovieAction
{
    public function handle(MovieStoreRequest $request, Movie $movie)
    {
        if($request->hasFile('image')){
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('pink\images'), $newImageName);
            $movie->update([
                'title' => $request->title,
                'image' => $request->has('image') ? $newImageName : null,
                'created_at' => now(),
            ]);
            $movie->genres()->sync($request->genres);
        } else {
            $movie->update([
                'title' => $request->title,
                'updated_at' => now(),
            ]);
            $movie->genres()->sync($request->genres);
        }
    }
}
