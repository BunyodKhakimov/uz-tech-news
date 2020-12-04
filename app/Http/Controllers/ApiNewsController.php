<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class ApiNewsController extends Controller
{
    public function index(){
        // get json from api
        $data = Http::get('http://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=bf216abe5c274f07b996f2833a791323')->body();

        // json to associative array
        $decoded_data = json_decode($data, true);

        // api fails
        if ($decoded_data['status'] != 'ok'){
            Session::flash('info', 'Api not working or news not found!');
            return redirect()->back();
        }

//        dd($decoded_data['articles']);
        return view('external.index')->withPosts($decoded_data['articles']);
    }
}
