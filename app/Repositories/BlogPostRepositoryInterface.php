<?php

namespace App\Repositories;

interface BlogPostRepositoryInterface
{
    public function find(string $slug);
}
