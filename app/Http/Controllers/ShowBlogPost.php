<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class ShowBlogPost extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $slug)
    {
      // Render single blog post or 404
      $blog_post = BlogPost::where('slug', $slug)->first();

      return view('blogpost', array(
        'blog_post' => $blog_post,
        'blog_post_url' => url()->full() .'/'
      ));
    }
}
