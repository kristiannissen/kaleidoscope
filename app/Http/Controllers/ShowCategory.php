<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class ShowCategory extends Controller
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
        $category = Category::where('slug', '=', $slug)
            ->with('blogentries')
            ->firstOrFail();

        return view('category', array(
            'name' => $category->name,
            'id' => $category->id,
            'blogentries' => $category->blogentries
        ));
    }
}
