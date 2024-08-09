<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    #[Validate('required|min:3|max:40')]
    public $name;

    #[Validate('required|min:3|max:40')]
    public $newName;

    use WithPagination;

    public function store()
    {
        $this->validateOnly('name');
        Category::create([
            'name'=>$this->name
        ]);
        $this->dispatch('close-modal');
        $this->cancelUpdate();
        return session()->flash('success', 'Categoria creata con successo');
    }

    public function update(Category $category)
    {
        $this->validateOnly('newName');
        $category->update([
            'name' => $this->newName
        ]);
        $this->dispatch('close-modal');
        $this->cancelUpdate();
        return session()->flash('success', 'Categoria aggiornata con successo');
    }

    public function delete(Category $category)
    {
        $category->delete();
        Post::where('category_id', $category->id)->update(['category_id'=>null]);
        return session()->flash('success', 'Categoria eliminata con successo');
    }

    public function cancelUpdate()
    {
        $this->reset('name', 'newName');
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate(10);
        return view('livewire.admin.categories', compact('categories'))
            ->extends('layout.appLayout')
            ->section('content');
    }
}
