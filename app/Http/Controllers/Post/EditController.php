<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['store', 'create', 'show']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.edit')
            ->withPost($post)
            ->withTags($tags)
            ->withCategories($categories);
    }
}
