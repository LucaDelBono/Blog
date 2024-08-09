<?php

namespace App\Http\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    public function index(){
        $posts= Post::with('category')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('home')->with('posts', $posts);
    }

    
}
