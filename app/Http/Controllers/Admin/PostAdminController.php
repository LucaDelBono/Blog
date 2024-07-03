<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostAdminController extends Controller
{
    public function index(){
        $posts= Post::with('user')->latest()->paginate(6);
        return view('admin.post.index', compact('posts'));
    }
}
