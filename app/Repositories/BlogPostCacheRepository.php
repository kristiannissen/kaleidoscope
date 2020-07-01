<?php

namespace App\Repositories;

use Illuminate\Cache\CacheManager;
use Illuminate\Support\Facades\Log;

use App\BlogPost;

class BlogPostCacheRepository implements BlogPostRepositoryInterface
{
    protected $blogpost_repository;
    protected $cache;

    public function __construct(
        CacheManager $cache,
        BlogPostRepository $blogpost_repository
    ) {
        $this->cache = $cache;
        $this->blogpost_repository = $blogpost_repository;
    }

    public function find(string $slug)
    {
        Log::debug('Returning from cacherepository');
        return $this->blogpost_repository->find($slug);
    }
}
