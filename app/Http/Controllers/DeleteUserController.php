<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeleteUserController extends Controller
{
    public function show(User $userSettingsDelete){
        $this->authorize('delete', $userSettingsDelete);
        $user= $userSettingsDelete;
        return view('user.include.deleteUser' , compact('user'));
    }

    public function destroy(User $userSettingsDelete){
        $this->authorize('delete', $userSettingsDelete);
        $user = $userSettingsDelete;
        /*request()->validate([
            'password'=>'required'
        ]);*/
        if(Hash::check(request('password'), $user->password)){
            $user->delete();
            return redirect()->route('register');
        }
        return view('user.include.deleteUser' , compact('user'));
    }
}
