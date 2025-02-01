<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Avatar;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('dashboard.perfil.perfil', compact('user'));
    }

    public function update(Request $request)
{
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        
        if ($request->hasFile('avatar')) {
            
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar->avatar);
            }

            
            $avatar = $request->file('avatar')->store('avatars', 'public');

           
            $user->avatar()->updateOrCreate(
                ['user_id' => $user->id],
                ['avatar' => $avatar]
            );
        }

        return redirect()->back()->with('success', 'Perfil actualizado correctamente');
    }
}
