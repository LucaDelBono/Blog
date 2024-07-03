<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangePropic extends Component
{
    use WithFileUploads;

    public User $user;

    #[Validate('nullable|image|max:1024')]
    public $image;

    public function update()
    {
        $validated= $this->validate();
        if ($this->image) {
            $this->validateOnly('image');
            $validated['image'] = $this->image->store('profile', 'public');
        }
        $this->user->update($validated);
        $this->cancelEdit();
        session()->flash('success','Foto profilo aggiornata con successo');
    }

    public function delete(){
        if($this->user->image){
            Storage::disk('public')->delete($this->user->image);
            $this->user->image = null;
            $this->user->save();
            session()->flash('success','Foto profilo eliminata con successo');
        }
    }
    
    public function cancelEdit()
    {
        $this->reset('image');
    }

    public function render()
    {
        $user= $this->user;
        return view('livewire.change-propic', compact('user'));
    }
}
