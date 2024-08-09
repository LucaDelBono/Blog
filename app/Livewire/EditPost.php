<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;

    #[Validate('required|min:1|max:50')]
    public $title;

    #[Validate('required|min:1|max:2000')]
    public $content;

    #[Validate('nullable|image|max:2048')]
    public $image;

    #[Validate('required')]
    public $user_id;

    #[Validate('nullable')]
    public $category_id;

    public Post $post;

    public function update()
    {
        $this->authorize('update', $this->post);
        $validated= $this->validate();
        if ($this->image) {
            $this->validateOnly('image');
            $validated['image'] = $this->image->store('thumbnail', 'public');
            $this->post->update($validated);
        }else{
            $this->post->update([
                'title'=>$this->title,
                'content'=>$this->content,
                'user_id'=>$this->user_id,
                'category_id'=>$this->category_id
            ]);
        }
        return redirect()->route('post.show', $this->post->id)->with('success', 'Post modificato con successo');
    }

    public function render()
    {
        $this->title= $this->post->title;
        $this->content= $this->post->content;
        $this->user_id= $this->post->user_id;
        $this->category_id= $this->post->category_id;
        $post= $this->post;
        $users= User::get();
        $categories= Category::get();

        return view('livewire.edit-post', compact(['post', 'users','categories']))
        ->extends('layout.appLayout')
        ->section('content');
    }
}
