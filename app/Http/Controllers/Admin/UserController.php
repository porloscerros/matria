<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show the application users index.
     */
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(50)
        ]);
    }

    /**
     * Show the form for create new user.
     */
    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Create a new user.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|alpha_dash',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->withSuccess(__('user.created'));
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request, User $user): RedirectResponse
    {
        if ($request->filled('password')) {
            $request->merge([
                'password' => Hash::make($request->input('password'))
            ]);
        }

        $user->update(array_filter($request->only(['name', 'email', 'password'])));

        $role_ids = array_values($request->get('roles', []));
        $user->roles()->sync($role_ids);

        return redirect()->route('admin.users.edit', $user)->withSuccess(__('users.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User  $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index')->withSuccess(__('users.deleted'));
    }
}
