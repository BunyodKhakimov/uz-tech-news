<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Tag;
use App\Category;
use Session;
use Image;

use HTMLPurifier;

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

        $categories = Category::all();

        return view('posts.index')
            ->withPosts($posts)
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
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
            'category_id' => 'required',
            'title' => 'required|max:100',
            'body' => 'required'
        ));

        // clean up $request->body from scripts

        $purifier = new HTMLPurifier();
        $clean_body = $purifier->purify($request->body);

        $post = new Post;

        // file uploaded

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/post_images/' . $filename);

            Image::make($image)->save($location);

            $post->image = $filename;
        }

        // store in DB
        
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        // Setting up relations
        
        $user = Auth::user();
        $user->post()->save($post);

        if(isset($request->tags)){
            $post->tags()->sync($request->tags, false);  
        }

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

        return view('posts.show')
            ->withPost($post)
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
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:100',
            'subtitle' => 'required|max:100',
            'category_id' => 'required',
            'title' => 'required|max:100',
            'body' => 'required'
        ));

        $post = Post::find($id);

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->update();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags, false);  
        }

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
