<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogPostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      // Collection for amp-list
      // https://amp.dev/documentation/examples/components/amp-list/?format=websites
      return array(
        'items' => $this->collection
      );
    }
}
