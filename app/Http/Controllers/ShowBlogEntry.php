<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BlogEntry;

class ShowBlogEntry extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $slug)
    {
        //
        $blogEntry = BlogEntry::where('slug', '=', $slug)
            ->with('categories')
            ->firstOrFail();

        return view('blogentry', array(
            'title' => $blogEntry->title,
            'content' => $blogEntry->content,
            'id' => $blogEntry->id,
            'categories' => $blogEntry->categories
            )
        );
    }
}
