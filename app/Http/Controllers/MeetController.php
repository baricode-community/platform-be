<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Meet index']);
    }

    public function list()
    {
        return response()->json(['message' => 'Meet list']);
    }
}
