<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
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
        $posts = Post::orderBy('id', 'desc')->simplepaginate(10);
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
            'body' => 'required'
        ));

        // store in DB

        $user = Auth::user();
        $post = new Post;
        
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->author = $user->name;

        $user->post()->save($post);

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
            'body' => 'required'
        ));

        $post = Post::find($id);

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->category = $request->category;
        $post->body = $request->body;
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
