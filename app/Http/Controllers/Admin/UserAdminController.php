<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserAdminController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    
    public function update(User $user)
    {
        $validated = request()->validate([
            'nickname' => 'required|min:2|max:20|unique:users,nickname,' . $user->id,
            'role'=> 'required'
        ]);
        $user->update($validated);
        return redirect()->route('admin.users');
    }
}
