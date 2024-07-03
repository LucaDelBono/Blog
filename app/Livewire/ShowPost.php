<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowPost extends Component
{
    use WithFileUploads;

    #[Validate('required|min:1|max:50')]
    public $title;

    #[Validate('required|min:1|max:2000')]
    public $content;

    #[Validate('nullable|image|max:2048')]
    public $image;

    public Post $post;

    public $editing = false;

    public function edit()
    {
        $this->authorize('update', $this->post);
        $this->editing = true;
        $this->title= $this->post->title;
        $this->content= $this->post->content;
    }

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
        $this->cancelEdit();
        session()->flash('success','Post modificato con successo');
    }

    public function delete()
    {
        $this->authorize('delete', $this->post);
        $this->post->delete();
        return redirect()->route('index');
    }

    public function cancelEdit(){
        $this->reset('editing');
    }


    public function render()
    {
        $post= $this->post;
        return view('livewire.show-post', compact('post'))
        ->extends('layout.appLayout')
        ->section('content');
    }
}
