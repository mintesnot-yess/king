<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index()
    {
        $usersList = User::latest()->paginate(10);

        return view(
            'admin.pages.system_users',
            [
                'usersList' => $usersList,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'System Users ', 'url' => null],
                ],
                'currentPage' => 'System Users',
            ],
        );
    }

    public function create()
    {
        return view('admin.pages.system_users.create', [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Profile', 'url' => route('profile.index')],
                ['name' => 'Create', 'url' => null]
            ],
            'currentPage' => 'Create User',
        ], );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'required|string|min:6',
            'role' => 'in:super_admin,admin',

        ]);




        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'created_by' => optional(Auth::user())->id,


        ]);

        return redirect()->route('profile.index', $user->id)->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.pages.system_users.show', [
            'user' => $user,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'profile', 'url' => route('profile.index')],
                ['name' => 'View', 'url' => null]
            ],
            'currentPage' => 'View User',
        ], );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.pages.system_users.edit', [
            'user' => $user,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Profile', 'url' => route('profile.index')],
                ['name' => 'Edit', 'url' => null]
            ],
            'currentPage' => 'Edit User',
        ], );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,',
            'password' => 'nullable|string|min:6',
            'role' => 'in:super_admin,admin',
        ]);


        // Update news
        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            'created_by' => optional(Auth::user())->id,
        ]);

        return redirect()->route('profile.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->role === 'super_admin') {
            return redirect()->route('profile.index')->with('error', 'Cannot delete a super user.');
        }
        $user->delete();
        return redirect()->route('profile.index')->with('success', 'User deleted successfully.');
    }
}
