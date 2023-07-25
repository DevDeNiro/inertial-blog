<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class UserController extends Controller
{
    // public function profile()
    // {
    //     $user = auth()->user();

    //     $this->authorize('view', $user);

    //     return Inertia::render('Profile/Show', ['user' => $user]);
    // }

    // public function updateProfile(Request $request)
    // {
    //     $user = auth()->user();

    //     $this->authorize('update', $user);

    //     $request->validate([
    //         'name' => ['required', 'max:255'],
    //         'email' => ['required', 'email', 'max:255'],
    //     ]);

    //     $user->name = $request->name;
    //     $user->email = $request->email;

    //     $user->save();

    //     return redirect()->route('profile.show');
    // }

    // public function changePassword(Request $request)
    // {
    //     $user = auth()->user();

    //     $request->validate([
    //         'current_password' => ['required'],
    //         'new_password' => ['required', 'min:8', 'confirmed'],
    //     ]);

    //     if (!Hash::check($request->current_password, $user->password)) {
    //         throw ValidationException::withMessages([
    //             'current_password' => ['The provided password does not match our records.']
    //         ]);
    //     }

    //     $user->password = Hash::make($request->new_password);
    //     $user->save();

    //     return redirect()->route('profile.show');
    // }

    //TODO: add informations method
    //TODO: delete account method
}
