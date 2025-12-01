<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'User index']);
    }

    public function list(): UserResource
    {
        $users = User::all();
        return new UserResource($users);
    }

    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return new UserResource($user);
    }
}
