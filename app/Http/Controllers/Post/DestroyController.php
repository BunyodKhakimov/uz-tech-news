<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use Session;
use File;

class DestroyController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['except'=>['store', 'create', 'show']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        File::delete(public_path('images/post_images' . $post->image));

        $post->delete();

        Session::flash('success', 'Post is successfully deleted!');

        return redirect()->route('posts.index');
    }
}
