<?php

namespace App\Http\Controllers\Web\Fun;

use App\Http\Controllers\Controller;
use App\Models\Fun\Meme;
use Illuminate\Http\Request;

class MemeController extends Controller
{
    public function index()
    {
        return view('pages.fun.meme.index');
    }

    public function create()
    {
        return view('pages.fun.meme.create');
    }
}
