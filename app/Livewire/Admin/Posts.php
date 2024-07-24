<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $search='';
    
    public function render()
    {
        $posts= Post::with('user')->search($this->search)->latest()->paginate(6);
        return view('livewire.admin.posts', compact('posts'))
        ->extends('layout.appLayout')
        ->section('content');
    }
}
