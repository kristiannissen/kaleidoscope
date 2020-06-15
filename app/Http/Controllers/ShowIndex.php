<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\BlogPost;

class ShowIndex extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Show latest blog post
        $blog_posts = BlogPost::latest()
            ->limit(10)
            ->orderBy('online_at', 'desc')
            ->get();

        return view('index', [
          'blog_posts' => $blog_posts
        ]);
    }
}
