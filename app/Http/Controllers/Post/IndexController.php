<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['store', 'create', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $posts = Post::orderBy('id', 'desc')->simplepaginate(10);

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.index')
            ->withPosts($posts)
            ->withTags($tags)
            ->withCategories($categories);
    }
}
