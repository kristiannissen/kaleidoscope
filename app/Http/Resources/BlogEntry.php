<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogEntry extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $dateFormat = 'U';

    public function toArray($request)
    {
        return array(
            'title' => $this->title,
            'content' => $this->content,
            'slug' => '/post/' . $this->slug,
            'created' => $this->created_at
        );
    }
}
