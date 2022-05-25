<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\User\StoreRequest;
use App\Http\Requests\Blog\User\UpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('blog.admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('blog.admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request, User $user)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user->create($input);

        return redirect()->route('blog.admin.user.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('blog.admin.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $input = $request->all();
        $user->update($input);

        return redirect()->route('blog.admin.user.index');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('blog.admin.user.index');
    }
}
