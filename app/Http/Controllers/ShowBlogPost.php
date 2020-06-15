<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;

use App\BlogPost;
use App\Http\Resources\BlogPostCollection;

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
      // Transform markdown
      $blog_post->content = Markdown::parse($blog_post->content);
      // Get next blog posts for infinite scroll
      $blog_posts = new BlogPostCollection(
        BlogPost::where([
          ['online', '=', 'online'],
          ['id', '>', $blog_post->id]
        ])->limit(10)->get()
      );

      return view('blogpost', array(
        'blog_post' => $blog_post,
        'blog_posts' => $blog_posts
      ));
    }
}
