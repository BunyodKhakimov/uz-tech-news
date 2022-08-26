<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use App\Services\PostStoreService;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['store', 'create', 'show']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, $id, PostStoreService $postStoreService)
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
}
