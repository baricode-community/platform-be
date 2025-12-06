<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.general.home.index');
    }

    public function profile(User $user)
    {
        // Logic to retrieve user profile by username can be added here
        return view('pages.general.home.profile', ['user' => $user]);
    }
}
