<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogOldest(){
        $posts= Post::with('user')->orderBy('created_at', 'ASC')->paginate(5);
        return view('blog.blogOldest', compact('posts'));
    }

    public function blogLatest(){    
        $posts= Post::with('user')->when(request()->has('search'), function ($query){
            $query->search(request('search',''));
        })->orderBy('created_at', 'DESC')->paginate(5);
        return view('blog.blogLatest', compact('posts'));

    }
}
