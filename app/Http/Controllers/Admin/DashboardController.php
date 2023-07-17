<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $this->authorize('accessAdminPanel');

        $users = User::all();
        return Inertia::render('Admin/Users/Index', ['users' => $users]);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return Inertia::render('Admin/Users/Show', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $user->update($validatedData);
        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();
        return redirect()->route('users.index');
    }
}
