<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Jobs\ProcessImage;
use App\BlogPost;
use App\File as ImageFile;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show list of blog posts with pagination
        $blog_posts = DB::table('blog_posts')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        return view('blogposts.index', [
            'blog_posts' => $blog_posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show form for new blog post
        $blog_post = new BlogPost();
        $blog_post->online = 'offline';

        return view('blogposts.create', [
            'blog_post' => $blog_post,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new blog post
        $blog_post = new BlogPost();
        $blog_post->title = $request->title;
        $blog_post->excerpt = $request->excerpt;
        $blog_post->content = $request->content;
        // TODO: Get user id from session
        $blog_post->user_id = 1;

        // Check online | offline
        if ($request->has('online')) {
            $blog_post->online = 'online';
        }
        $blog_post->save();

        return redirect('admin/blogposts/')->with(
            'status',
            'Blog Post Created'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show single blog post stats
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Show form for editing a blog post
        $blog_post = BlogPost::find($id);
        return view('blogposts.edit', [
            'blog_post' => $blog_post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update a single blog post
        $blog_post = BlogPost::find($id);
        $blog_post->title = $request->title;
        $blog_post->excerpt = $request->excerpt;
        $blog_post->content = $request->content;
        // TODO: Get user id from session
        $blog_post->user_id = 1;

        // Check online | offline
        if ($request->has('online')) {
            $blog_post->online = 'online';
        }

        $blog_post->save();

        // Files upload blog_file
        if ($request->hasfile('blog_file')) {
            foreach ($request->file('blog_file') as $key => $blog_file) {
                $path = $blog_file->store(env('IMAGE_THEME_FOLDER'));
                // Store in DB
                $file = ImageFile::create([
                    'file_name' => $path,
                    'role' => $request->blog_file_role[$key],
                    'model_name' => 'BlogPost',
                    'model_id' => $blog_post->id,
                    'mimetype' => $blog_file->getClientMimeType(),
                    'priority' => $request->blog_file_priority[$key],
                    'file_size' => 'original',
                ]);

                // Create image resize job
                // FIXME: Add more mimetypes as well as upload validation
                if (in_array($blog_file->getClientMimeType(), ["image/jpeg"])) {
                    ProcessImage::dispatch($file)->delay(now()->addMinutes(10));
                }
            }
        }

        return redirect('admin/blogposts/')->with(
            'status',
            'Blog Post Updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
