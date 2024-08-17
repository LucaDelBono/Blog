<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort='desc';

    #[Url()]
    public $category='';

    #[Url()]
    public $search='';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
        $this->reset(['category', 'search']);
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search= $search;
    } 

    public function render()
    {
        if(request('category'))
        {
            $this->category=request('category');
            $posts= Post::orderBy('created_at', $this->sort)
                ->where('category',$this->category)
                ->paginate(5);
        }else{
            $posts= Post::search($this->search)->orderBy('created_at', $this->sort)
            ->paginate(5);
            $this->reset('category');
        }
        return view('livewire.post-list', compact('posts'));
    }
}
