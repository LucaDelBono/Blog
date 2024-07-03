<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentAdminController extends Controller
{
    public function index(){
        $comments= Comment::with('user')->latest()->paginate(6);
        return view('admin.comment.index', compact('comments'));
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('admin.comments.index');
    }
}
