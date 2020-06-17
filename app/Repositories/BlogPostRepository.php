<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Log;

use App\BlogPost;

class BlogPostRepository implements BlogPostRepositoryInterface
{
    protected $model;

    public function __construct(BlogPost $model)
    {
        $this->model = $model;
    }

    public function find(string $slug)
    {
        Log::debug('Returning from repository');
        return $this->model->where('slug', '=', $slug)->first();
    }
}
