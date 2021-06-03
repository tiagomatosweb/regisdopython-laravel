<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('todos')->get();
        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        $user->load('todos');
        return new UserResource($user);
    }
}
