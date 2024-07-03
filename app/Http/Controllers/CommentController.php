<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post){
        $validated= request()->validate([
            'content'=>'required|min:1|max:255'
        ]);

        $validated['user_id']= auth()->id();
        $validated['post_id']= $post->id;
        Comment::create($validated);
        return redirect()->route('posts.show', $post->id);

    }

    public function destroy(Post $post, Comment $comment){
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('posts.show', $post->id);
    }

    public function edit(Post $post, Comment $comment){
        $this->authorize('update', $comment);
        $editComment = true;
        $editCommentId = $comment->id;
        return view('post.showPost', compact('editComment','post','editCommentId'));
    }

    public function update(Post $post, Comment $comment){
        $this->authorize('update', $comment);
        $validated= request()->validate([
            'content'=>'min:1|max:255|required'
        ]);
        $comment->update($validated);
        return view('post.showPost', compact('post'));
    }
}
