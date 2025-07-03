<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show the user's profile
    public function index(Request $request)
    {
        $currentUser = $request->user();
        $createdByUsers = User::where('created_by', $currentUser->id)->get();
        $users = User::all();

        return view('admin.pages.profile.show', [
            'currentUser' => $currentUser,
            "users" => $users,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Profile ', 'url' => null],
            ],
            'currentPage' => 'Profile',
        ]);
    }
    // Show the form for editing the authenticated user's profile
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('admin.pages.profile.edit', [
            'user' => $user,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Profile', 'url' => route('profile.index')],
                ['name' => 'Edit', 'url' => null]
            ],
            'currentPage' => 'Edit Profile',
        ]);
    }

    // Update the user's profile
    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'in:super_admin,admin',
        ]);
        // If password is provided, hash it
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // Remove password if not provided
        }


        $user->update($data);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
