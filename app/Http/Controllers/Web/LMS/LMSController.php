<?php

namespace App\Http\Controllers\Web\LMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LMSController extends Controller
{
    public function index()
    {
        return view('pages.lms.index');
    }
}
