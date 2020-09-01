<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
	public function index(){
        // all not hidden posts
		$posts = Post::where('hidden', 'false')->orderBy('id', 'desc')->simplepaginate(3);

        // 4 most liked posts
        $mostLikedPosts = Post::orderBy('likes', 'desc')->limit(4)->get();

        // 5 most viewed posts
        $mostViewedPosts = Post::orderBy('views', 'desc')->limit(5)->get();

        return view('pages.index')
        ->withPosts($posts)
        ->with('most_liked_posts', $mostLikedPosts)
        ->with('most_viewed_posts', $mostViewedPosts);
	}

    public function parts(){
    	return view('pages.parts');
    }

    public function getSinglePost($id){
        $post = Post::find($id);

        // increment number of views and update 
        $post->views = $post->views + 1;
        $post->update();
        
        return view('posts.show')->withPost($post);
    }

    public function about(){
    	return view('pages.about');
    }
}
