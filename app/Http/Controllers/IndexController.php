<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $posts= Post::orderBy('created_at', 'DESC')->limit(6)->get();
        return view('home')->with('posts', $posts);
    }

    
}
