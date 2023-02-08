<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'song';

    public function toArray($request)
    {
        return [
            'title' => $this->resource->title,
            'artist' => new ArtistResource($this->resource->artist),
            'album' => $this->resource->album,
            'released in' => $this->resource->released_in,
            'genre' => new GenreResource($this->resource->genre)
        ];
    }
}
