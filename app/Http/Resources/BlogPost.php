<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogPost extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      // Mimics amp-list item
      return array(
        'title' => $this->title,
        'url' => $this->slug,
        'imageUrl' => $this->theme_image
      );
    }
}
