<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowPost extends Component
{
    public Post $post;

    public function delete()
    {
        $this->authorize('delete', $this->post);
        $this->post->delete();
        return redirect()->route('index');
    }

    public function render()
    {
        $post = $this->post;
        return view('livewire.show-post', compact('post'))
            ->extends('layout.appLayout')
            ->section('content');
    }
}
