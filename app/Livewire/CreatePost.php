<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    #[Validate('required|min:1|max:50')]
    public $title;

    #[Validate('required|min:1|max:2000')]
    public $content;

    #[Validate('required|image|max:2048')]
    public $image;

    #[Validate('required')]
    public $user_id;

    public function store()
    {
        $this->authorize('create', Post::class);
        $validated = $this->validate();
        if ($this->image) {
            $validated['image'] = $this->image->store('thumbnail', 'public');
        }
        Post::create($validated);
        $this->reset(['title','content','image', 'user_id']);
        return session()->flash('success', 'Post creato con successo');
    }

    public function render()
    {
        $this->authorize('create', Post::class);
        $users = DB::table('users')->whereIn('role', ['Admin', 'Autore', 'Redattore'])->get();
        return view('livewire.create-post', compact('users'))
            ->extends('layout.appLayout')
            ->section('content');
    }
}
