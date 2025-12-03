<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.general.dashboard.index');
    }
}
