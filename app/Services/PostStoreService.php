<?php

namespace App\Services;

use App\Post;
use HTMLPurifier;
use Illuminate\Support\Facades\Auth;
use Image;
use File;

class PostStoreService
{
    public function __invoke($post, $data): Post
    {
        // file save
        if($data->hasFile('image')){
            $oldImagePath = public_path('images/post_images/'. $post->image);
            if(!empty($post->image)) {
                File::delete($oldImagePath);
            }
        }

        // clean up $request->body from scripts
        $purifier = new HTMLPurifier();
        $clean_body = $purifier->purify($data['body']);

        // store in DB
        $post->title = $data['title'];
        $post->subtitle =  $data['subtitle'];
        $post->category_id =  $data['category_id'];
        $post->body = $clean_body;
        $post->image = $data->hasFile('image') ? $this->saveImage($data->file('image')) : '';

        // Setting up relations
        $user = Auth::user();
        $user->post()->save($post);

        if(isset($data['tags'])){
            $post->tags()->sync($data['tags'], false);
        }

        return $post;
    }

    private function saveImage($image)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/post_images/' . $filename);

        Image::make($image)->save($location);

        return $filename;
    }
}
