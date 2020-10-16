<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')
            ->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:100'
        ));

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Category is successfully created!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit')->withCategory($category);
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
            'name' => 'required|max:100'
        ));

        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $posts = $category->posts()->get();

        $postsCount = count($posts);

        if ($postsCount > 0) {
            Session::flash('info', 
                'You can not delete category with ' . $postsCount . ' posts!');
        } else {
            $category->delete();

            Session::flash('success', 'Category successfully deleted!');
        }

        return redirect()->back();
    }
}
