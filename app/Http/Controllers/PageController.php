<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PageController extends Controller
{
	public function index(){
        // all not hidden posts
		$posts = Post::where('hidden', 'false')->orderBy('id', 'desc')->simplepaginate(3);

        return view('pages.index')
        ->withPosts($posts)
        ->with('most_liked_posts', $this->getMostLiked())
        ->with('most_viewed_posts', $this->getMostViewed());
	}

    public function parts(){
    	return view('pages.parts');
    }

    public function about(){
    	return view('pages.about');
    }

    public function getSinglePost($id){
        $post = Post::find($id);

        $this->incrementViews($post);
        
        return view('posts.show')->withPost($post);
    }

    public function incrementViews($post){

        // increment number of views and update

        $post->views = $post->views + 1;
        $post->update();
    }

    public function incrementLikes($id){

        $post = Post::find($id);

        // increment number of likes and update

        $post->likes = $post->likes + 1;
        $post->update();

        Session::flash('success', 'Post ' . $post->id . ' liked!');

        return redirect()->back();
    }

    public function getByCategory($category){
        $posts = Post::where('category', $category)->orderBy('id', 'desc')->simplepaginate(3);

        // if no posts found
        if(sizeof($posts) == 0){

            Session::flash('info', 'Posts about ' 
                . $category .' are not found!');
            return redirect()->back();
        }

        return view('pages.index')
        ->withPosts($posts)
        ->with('most_liked_posts', $this->getMostLiked())
        ->with('most_viewed_posts', $this->getMostViewed());
    }

    public function getMostLiked(){
        // 4 most liked posts
        $mostLikedPosts = Post::orderBy('likes', 'desc')->limit(4)->get();
        return $mostLikedPosts;
    }

    public function getMostViewed(){
        // 5 most viewed posts
        $mostViewedPosts = Post::orderBy('views', 'desc')->limit(5)->get();
        return $mostViewedPosts;
    }

    public function getByAuthor($author){
        $posts = Post::where('author', $author)->orderBy('id', 'desc')->simplepaginate(3);

        if(sizeof($posts) == 0){
            Session::flash('info', 'No posts of this author found!');
            return redirect()->back();
        }

        return view('pages.index')->withPosts($posts)
        ->with('most_liked_posts', $this->getMostLiked())
        ->with('most_viewed_posts', $this->getMostViewed());
    }
}
