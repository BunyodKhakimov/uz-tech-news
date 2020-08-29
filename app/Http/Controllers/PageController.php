<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
	public function index(){
		$posts = Post::orderBy('id', 'desc')->simplepaginate(3);
        return view('pages.index')->withPosts($posts);
	}

    public function parts(){
    	return view('pages.parts');
    }

    public function getSinglePost($id){
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    public function about(){
    	return view('pages.about');
    }
}
