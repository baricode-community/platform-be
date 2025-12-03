<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeetResource;
use App\Models\Meet;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Meet index']);
    }

    public function list(): MeetResource
    {
        $meets = Meet::all();
        return new MeetResource($meets);
    }
}
