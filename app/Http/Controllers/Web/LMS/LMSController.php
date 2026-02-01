<?php

namespace App\Http\Controllers\Web\LMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LMSController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('pages.lms.index', compact('user'));
    }
}
