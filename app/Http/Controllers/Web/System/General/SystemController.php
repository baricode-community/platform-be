<?php

namespace App\Http\Controllers\Web\System\General;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Meet;
use App\Models\UserMeet;
use App\Models\Fun\Meme;
use App\Models\Fun\MemeVote;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'active_users' => User::where('email_verified_at', '!=', null)->count(),
            'total_meets' => Meet::count(),
            'active_meets' => Meet::where('status', 'active')->count(),
            'total_memes' => Meme::count(),
            'total_votes' => MemeVote::count(),
            'user_participations' => UserMeet::count(),
        ];

        $recent_users = User::latest()->take(10)->get();
        $recent_memes = Meme::with('user')->latest()->take(10)->get();
        $recent_meets = Meet::latest()->take(10)->get();

        $chart_data = [
            'users_per_day' => $this->getUsersPerDay(),
            'memes_per_day' => $this->getMemesPerDay(),
            'meets_per_day' => $this->getMeetsPerDay(),
        ];

        return view('pages.system.general.index', [
            'stats' => $stats,
            'recent_users' => $recent_users,
            'recent_memes' => $recent_memes,
            'recent_meets' => $recent_meets,
            'chart_data' => $chart_data,
        ]);
    }

    private function getUsersPerDay()
    {
        return User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    private function getMemesPerDay()
    {
        return Meme::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    private function getMeetsPerDay()
    {
        return Meet::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    public function users()
    {
        return view('pages.system.general.users');
    }

    public function export()
    {
        
        return view('pages.system.general.export');
    }

    public function import()
    {
        return view('pages.system.general.import');
    }
}
