<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Mail;

class PageController extends Controller
{
	public function index(){
        // all not hidden posts
		$posts = Post::where('hidden', 'false')->orderBy('id', 'desc')->simplepaginate(3);

        $categories = Category::all();

        $tags = Tag::all();
        
        return view('pages.index')
            ->withPosts($posts)
            ->withTags($tags)
            ->withCategories($categories)
            ->with('most_liked_posts', $this->getMostLiked())
            ->with('most_viewed_posts', $this->getMostViewed());
	}

    public function parts(){
        $categories = Category::all();
        $tags = Tag::all();
    	return view('pages.parts')->withCategories($categories)->withTags($tags);
    }

    public function about(){
        $categories = Category::all();
        $tags = Tag::all();
    	return view('pages.about')->withCategories($categories)->withTags($tags);
    }

    public function contact(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.contact')->withCategories($categories)->withTags($tags);
    }

    public function postContact(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'body' => 'required|min:10'
        ));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body 
        );

        Mail::send('mail.contact', $data, 
            function ($message) use ($data) {
                $message->from($data['email']);
                $message->to('khakimov.bunyod99@gmail.com');
                $message->subject($data['subject']);
            }
        );

        Session::flash('success', 'Your message was sent successfully!');

        return redirect('/');
    }

    public function getSinglePost($id){
        $post = Post::find($id);

        $this->incrementViews($post);

        $categories = Category::all();
        
        return view('posts.show')
            ->withPost($post)
            ->withCategories($categories);
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

    public function getByCategory($category_id){
        $posts = Post::where('category_id', $category_id)->orderBy('id', 'desc')->simplepaginate(3);

        // if no posts found
        if(sizeof($posts) == 0){

            Session::flash('info', 'Posts for this category are not found!');
            return redirect()->back();
        }

        $categories = Category::all();

        return view('pages.index')
            ->withPosts($posts)
            ->withCategories($categories)
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

        $categories = Category::all();

        return view('pages.index')->withPosts($posts)
            ->withCategories($categories)
            ->with('most_liked_posts', $this->getMostLiked())
            ->with('most_viewed_posts', $this->getMostViewed());
    }
}
