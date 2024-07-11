<?php

namespace App\Livewire;

use App\Models\Post;
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
                'content'=>$this->content
            ]);
        }
        return redirect()->route('post.show', $this->post->id)->with('success', 'Post modificato con successo');
    }

    public function render()
    {
        $this->title= $this->post->title;
        $this->content= $this->post->content;
        $post= $this->post;
        return view('livewire.edit-post', compact('post'))
        ->extends('layout.appLayout')
        ->section('content');
    }
}
