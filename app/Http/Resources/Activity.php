<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Activity extends JsonResource
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
        'model' => $this->model,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'user_name' => $this->user_name,
        'user_id' => $this->user_id,
        'data' => $this->data
      );
    }
}
