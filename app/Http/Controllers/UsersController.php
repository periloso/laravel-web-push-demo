<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * GET /users
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    /**
     * GET /users/create
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * POST /users
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\View\View
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return redirect()->route('users.show', $user)
            ->withSuccess('User was created successfully.');

    }

    /**
     * GET /users/1
     *
     * @param \App\Models\User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * GET /users/1/edit
     *
     * @param \App\Models\User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * PUT /users/1
     *
     * @param \App\Models\User $user
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\View\View
     */
    public function update(User $user, UserRequest $request)
    {
        $user->update($request->all());

        return redirect()->route('users.show', $user)
            ->withSuccess('User was updated successfully.');
    }

    /**
     * DELETE /users/1
     *
     * @param \App\Models\User $user
     * @return \Illuminate\View\View
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }


}
