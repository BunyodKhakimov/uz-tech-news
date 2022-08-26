<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use App\Services\PostStoreService;
use Illuminate\Http\Request;
use Session;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['store', 'create', 'show']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, PostStoreService $postStoreService)
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

        //notification
        Session::flash('success', 'Post is successfully saved!');

        // redirect
        return redirect()->route('posts.show', $post->id);
    }
}
