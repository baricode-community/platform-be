<?php

namespace App\Http\Controllers\Web\Bot;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WhatsappBotController extends Controller
{
    public function index()
    {
        return view('pages.bot.whatsapp.index');
    }
}
