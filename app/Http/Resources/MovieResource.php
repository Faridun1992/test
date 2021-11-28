<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */

    public function toArray($request)
    {
        $defaultImage = 'no_image.jpg';
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => ($this->image) ? url('pink/images').'/'.$this->image : url('pink/images').'/'.$defaultImage,
            'genre' => MovieGenreResource::collection($this->whenLoaded('genres')),
        ];
    }
}
