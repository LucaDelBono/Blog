<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $search='';

    public function delete(Comment $comment){
        $comment->delete();
        return session()->flash('success', 'Commento eliminato con successo');
    }

    public function render()
    {
        $comments= Comment::with('user', 'post')->search($this->search)->latest()->paginate(6);
        return view('livewire.admin.comments', compact('comments'))
        ->extends('layout.appLayout')
        ->section('content');
    }
}