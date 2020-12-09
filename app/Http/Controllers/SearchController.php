<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Session;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getByCategory($category_id){
        $posts = Post::where('category_id', $category_id)->orderBy('id', 'desc')->simplepaginate(3);

        // if no posts found
        if(sizeof($posts) == 0){

            Session::flash('info', 'Posts for this category are not found!');
            return redirect()->back();
        }

        $tags = Tag::all();
        $categories = Category::all();

        $category = Category::whereId($category_id)->get('name');
        $category_name = $category[0]['name'];

        Session::flash('success', 'Posts of ' . $category_name . ' category are shown!');

        $post = new Post();

        return view('pages.index')
            ->withPosts($posts)
            ->withTags($tags)
            ->withCategories($categories)
            ->with('most_liked_posts', $post->getMostLiked())
            ->with('most_viewed_posts', $post->getMostViewed());
    }


    public function getByTag($tag_id){
        // getting all data from post_tag table

        $post_tag = DB::table('post_tag')->where('tag_id', $tag_id)->get();

        // construct post_id array

        foreach ($post_tag as $post){
            $posts_id[] = $post->post_id;
        }

        $posts = Post::whereIn('id', $posts_id)->orderBy('id', 'desc')->simplepaginate(3);

        // if no posts found

        if(sizeof($posts) == 0){

            Session::flash('info', 'Posts with this tag are not found!');
            return redirect()->back();
        }

        $tags = Tag::all();
        $categories = Category::all();

        $tag = Tag::whereId($tag_id)->get('name');
        $tag_name = $tag[0]['name'];

        Session::flash('success', 'Posts with tag ' . $tag_name . ' are shown!');

        $post = new Post();

        return view('pages.index')
            ->withPosts($posts)
            ->withTags($tags)
            ->withCategories($categories)
            ->with('most_liked_posts', $post->getMostLiked())
            ->with('most_viewed_posts', $post->getMostViewed());
    }

    public function getByAuthor($user_id){
        $posts = Post::where('user_id', $user_id)->orderBy('id', 'desc')->simplepaginate(3);

        if(sizeof($posts) == 0){
            Session::flash('info', 'No posts of this author found!');
            return redirect()->back();
        }

        $tags = Tag::all();
        $categories = Category::all();

        $author = User::whereId($user_id)->get('name');
        $author_name = $author[0]['name'];

        Session::flash('success', 'Posts of ' . $author_name . ' are shown!');

        $post = new Post();

        return view('pages.index')->withPosts($posts)
            ->withCategories($categories)
            ->withTags($tags)
            ->with('most_liked_posts', $post->getMostLiked())
            ->with('most_viewed_posts', $post->getMostViewed());
    }
}
