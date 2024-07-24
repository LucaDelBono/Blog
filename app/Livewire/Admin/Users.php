<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{   
    use WithPagination;
    public $search='';

    public function render()
    {
        $users = User::search($this->search)->latest()->paginate(6);
        return view('livewire.admin.users', compact('users'))
        ->extends('layout.appLayout')
        ->section('content');
    }
}
