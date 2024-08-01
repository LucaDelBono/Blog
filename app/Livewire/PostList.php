<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $sort='desc';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    public function render()
    {
        $posts= Post::orderBy('created_at', $this->sort)->paginate(5);
        return view('livewire.post-list', compact('posts'));
    }
}
