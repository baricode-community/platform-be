<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Meet index']);
    }

    public function list()
    {
        $meets = Meet::all();
        return response()->json(['data' => $meets]);
    }
}
