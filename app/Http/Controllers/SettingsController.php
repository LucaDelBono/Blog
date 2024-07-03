<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return $this->edit(auth()->user());
    }

    public function edit(User $user){
        return view('user.settings', compact('user'));
    }

    public function update(User $userSetting){
        $validated= request()->validate([
            'name'=>'required|min:2|max:20',
            'surname'=>'required|min:2|max:30',
            'nickname'=>'required|min:2|max:20|unique:users,nickname,'. $userSetting->id,
            'email'=>'required|email|unique:users,email,'. $userSetting->id,
            'about'=>'min:1|max:255|nullable'
        ]);
        
        $userSetting->update($validated);
        return redirect()->route('userSettings.index')->with('success','Dati aggiornati con successo');
    }
}
