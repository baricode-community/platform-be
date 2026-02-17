<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $planned = Timeline::where(['status' => 'planned'])->orderBy('start_date', 'asc')->get();
        $ongoing = Timeline::where(['status' => 'ongoing'])->orderBy('start_date', 'asc')->get();
        $completed = Timeline::where(['status' => 'completed'])->orderBy('end_date', 'desc')->get();
        $timelines = $planned->concat($ongoing)->concat($completed);

        return view('pages.general.home.index', [
            'timelines' => $timelines,
        ]);
    }

    public function profile(User $user = null)
    {
        $user = $user ?? auth()->user();
        if (!$user) {
            abort(404);
        }
        return view('pages.general.home.profile', ['user' => $user]);
    }
}
