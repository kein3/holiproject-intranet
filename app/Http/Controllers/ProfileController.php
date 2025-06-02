<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'bio'      => 'nullable|string',
            'avatar'   => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $data['name'];
        $user->bio  = $data['bio'] ?? $user->bio;

        if ($request->filled('password')) {
            $user->password = Hash::make($data['password']);
        }

        if ($request->hasFile('avatar')) {
            // Supprimer l’ancien avatar si besoin
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $user->save();

        return redirect()->route('profile.edit')
                         ->with('status', 'Profil mis à jour !');
    }
}
