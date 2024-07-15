<?php

namespace App\Livewire;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Comment extends Component
{
    public Post $post;

    #[Validate('required|min:1|max:255')]
    public $content='';

    public $editCommentId;

    #[Validate('required|min:1|max:255')]
    public $editCommentContent;
    
    public function store(){
        $validated= $this->validateOnly('content');
        $validated['user_id']= auth()->id();
        $validated['post_id']= $this->post->id;
        ModelsComment::create($validated);
        $this->reset(['content']);
        $post= $this->post;
    }

    public function delete(ModelsComment $comment){
        $this->authorize('delete', $comment);
        $comment->delete();
    }

    public function edit(ModelsComment $comment){
        $this->authorize('update', $comment);
        $this->editCommentId = $comment->id;
        $this->editCommentContent = $comment->content;

    }

    public function cancelEdit(){
        $this->reset('editCommentContent', 'editCommentId');
    }

    public function update(ModelsComment $comment){
        $this->authorize('update', $comment);
        $this->validateOnly('editCommentContent');
        $comment->update([
            'content'=>$this->editCommentContent
        ]);
        $this->cancelEdit();
    }

    public function render()
    {
        $post= $this->post;
        return view('livewire.comment', compact('post'));
    }
}
