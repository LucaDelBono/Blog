<?php

namespace App\Http\Controllers;

use App\Models\Category;

class BlogController extends Controller
{
    public function index(){    
        
        $categories= Category::inRandomOrder()->limit(3)->get();
        return view('blog.index', compact('categories'));

    }
}
