<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index(){
		return view('pages.index');
	}

    public function parts(){
    	return view('pages.parts');
    }

    public function post(){
    	return view('pages.post');
    }

    public function about(){
    	return view('pages.about');
    }
}
