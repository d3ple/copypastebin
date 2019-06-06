<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show()
    {
        return view("user_profile");
    }


    public function update(UpdateUserRequest $request)
    {
        $validatedData = $request->validated();
        auth()->user()->update(array_filter($validatedData));
        return back();
    }

}
