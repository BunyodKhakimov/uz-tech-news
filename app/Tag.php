<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
		'post_id', 'title'
	];
	
    public function user()
    {
    	return $this->belongsTo('App\Post');   
    }
}