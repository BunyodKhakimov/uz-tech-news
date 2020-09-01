<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'user_id', 'title', 'subtitle', 'category', 'body', 'likes', 'views', 'hidden', 'author'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tag()
    {
        return $this->hasMany('App\Tag');
    }
}
