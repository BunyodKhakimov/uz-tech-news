<?php

namespace App\Http\Controllers;

use App\Services\PostStoreService;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Image;
use File;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['except'=>['store', 'create', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->simplepaginate(10);

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.index')
            ->withPosts($posts)
            ->withTags($tags)
            ->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')
            ->withCategories($categories)
            ->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PostStoreService $postStoreService)
    {
        // validation

        $this->validate($request, array(
            'title' => 'required|max:100',
            'subtitle' => 'required|max:100',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'sometimes|image'
        ));

        $post = new Post;
        $post = $postStoreService($post, $request);

        //notificaation

        Session::flash('success', 'Post is successfully saved!');

        // redirect

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.show')
            ->withPost($post)
            ->withTags($tags)
            ->withCategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.edit')
            ->withPost($post)
            ->withTags($tags)
            ->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, PostStoreService $postStoreService)
    {
        $this->validate($request, array(
            'title' => 'required|max:100',
            'subtitle' => 'required|max:100',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'sometimes|image'
        ));

        $post = Post::find($id);

        $post = $postStoreService($post, $request);

        Session::flash('success', 'Post is successfully updated!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        File::delete(public_path('images/post_images' . $post->image));

        $post->delete();

        Session::flash('success', 'Post is successfully deleted!');

        return redirect()->route('posts.index');
    }

    public function hiddenToggle($id)
    {
        $post = Post::find($id);

        $post->hidden = !$post->hidden;

        $strHidden = $post->hidden ? 'hidden' : 'visible';

        $post->update();

        Session::flash('success', 'Post is ' . $strHidden . ' now!');

        return redirect()->route('posts.index');
    }
}
