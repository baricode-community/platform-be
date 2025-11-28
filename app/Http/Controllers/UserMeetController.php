<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMeetController extends Controller
{
    public function index()
    {
        return view('pages.meets.index');
    }
}
