<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user){
        $posts= $user->post()->paginate(4);
        return view('user.show', compact('user','posts'));
    }

    public function profile(){
        return $this->show(auth()->user());
    }

    public function edit(User $user){
        $this->authorize('update', $user);
        $editing= true;
        $posts= $user->post()->get();
        return view('user.edit', compact('user', 'editing','posts'));
    }

    public function update(User $user){
        $this->authorize('update', $user);
        $validated= request()->validate([
            'image'=>'image',
            'about'=>'min:1|max:255|nullable'
        ]);
        if(request()->has('image')){
            $imagePath= request()->file('image')->store('profile','public');
            $validated['image']= $imagePath;
        }
        $user->update($validated);
        return redirect()->route('profile')->with('success','Foto profilo aggiornata con successo');

    }
}
