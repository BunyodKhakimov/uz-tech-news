<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Relationships

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }


    // Helpers

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
}
