<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexAdminController extends Controller
{
    public function index(){
        $totalPosts= Post::count();
        $totalUsers= User::count();
        $totalComments= Comment::count();
        return view('admin.index', compact('totalPosts', 'totalUsers', 'totalComments'));
    }
}
