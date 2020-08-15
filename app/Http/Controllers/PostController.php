<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation 

        $this->validate($request, array(
            'title' => 'required|max:100',
            'subtitle' => 'required|max:100',
            'category' => 'required|max:50',
            'title' => 'required|max:100',
            'body' => 'required',
            'hidden' => 'boolean'
        ));

        // store in DB

        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->hidden = $request->hidden;

        $post->save();

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
        return view('posts.show')->withPost($post);
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
        return view('posts.edit')->withPost($post);
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
        $this->validate($request, array(
            'title' => 'required|max:100',
            'subtitle' => 'required|max:100',
            'category' => 'required|max:50',
            'title' => 'required|max:100',
            'body' => 'required',
            'hidden' => 'boolean'
        ));

        $post = Post::find($id);

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->hidden = $request->hidden;

        $post->update();

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

        $post->delete();

        Session::flash('success', 'Post is successfully deleted!');

        return redirect()->route('posts.index');
    }
}
