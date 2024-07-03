<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;

    public function like(){
        $user= auth()->user();
        if($user->likesPost($this->post)){
            $user->likes()->detach($this->post);
        }else{
        $user->likes()->attach($this->post);
        }
    }

    public function render()
    {
        $post= $this->post;
        return view('livewire.like-button', compact('post'));
    }
}
