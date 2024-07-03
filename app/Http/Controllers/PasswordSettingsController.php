<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordSettingsController extends Controller
{
    public function update(User $user){
        request()->validate([
            'password'=>'required',
            'newPassword'=> 'required|same:password_confirmation'
        ]);

        if(Hash::check(request('password'), $user->password)){
            $user->fill([
                'password'=> Hash::make(request('newPassword'))
            ])->save();
            return redirect()->route('userSettings.index')->with('success', 'Password aggiornata con successo');
        } else{
            return redirect()->route('userSettings.index');
        }
    
    }
}
