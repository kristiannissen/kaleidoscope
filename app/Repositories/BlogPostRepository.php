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
        if (!Cache::has($slug)) {
            $this->model = $this->model->where('slug', '=', $slug)->first();
            $image_files = ImageFile::where('model_name', '=', 'BlogPost')
                ->where('model_id', '=', $this->model->id)
                ->where('file_size', '!=', 'original')
                ->get();
            $blog_post_images = [
                'hero_images' => [],
                'slider_images' => [],
            ];
            foreach ($image_files as $image_file) {
                if ($image_file->role == 'hero_image') {
                    array_push($blog_post_images['hero_images'], [
                        'breakpoint_' .
                        $image_file->file_size => $image_file->file_name,
                    ]);
                }
            }
            $this->model->hero_images = $blog_post_images['hero_images'];
            Cache::put($slug, $this->model, now()->addMinutes(10));
        } else {
            $this->model = Cache::get($slug);
        }
        return $this->model;
    }
}
