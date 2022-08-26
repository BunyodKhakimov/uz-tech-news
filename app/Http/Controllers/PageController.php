<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;

class PageController extends Controller
{
	public function index(){
        // all not hidden posts
		$posts = Post::where('hidden', false)->orderBy('id', 'desc')->simplepaginate(3);

        $categories = Category::all();

        $tags = Tag::all();

        // instance of Post to use it's helpers

        $post = new Post();

        return view('pages.index')
            ->withPosts($posts)
            ->withTags($tags)
            ->withCategories($categories)
            ->with('most_liked_posts', $post->getMostLiked())
            ->with('most_viewed_posts', $post->getMostViewed());
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

        $tags = Tag::all();

        return view('posts.show')
            ->withPost($post)
            ->withTags($tags)
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

}
