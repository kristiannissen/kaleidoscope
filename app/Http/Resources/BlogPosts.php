<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogPosts extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return array(
        'id' => $this->id,
        'title' => $this->title,
        'excerpt' => $this->excerpt,
        'content' => $this->content,
        'slug' => $this->slug,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'online_at' => $this->online_at
      );
    }
}
