<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

use App\BlogPost;
use App\File as ImageFile;

class BlogPostRepository implements BlogPostRepositoryInterface
{
    protected $model;

    public function __construct(BlogPost $model)
    {
        $this->model = $model;
    }

    public function find(string $slug)
    {
        $blog_post = Cache::get($slug, function () use ($slug) {
            $this->model = $this->model->where('slug', '=', $slug)->first();
            $image_files = ImageFile::where('model_name', '=', 'BlogPost')
                ->where('model_id', '=', $this->model->id)
                ->where('file_size', '!=', 'original')
                ->get();
            return $this->model;
        });
        return $blog_post;
    }
}
