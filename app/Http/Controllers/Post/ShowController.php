<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;

class ShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['store', 'create', 'show']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.show')
            ->withPost($post)
            ->withTags($tags)
            ->withCategories($categories);
    }
}
