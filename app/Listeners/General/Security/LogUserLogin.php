<?php

namespace App\Listeners\General\Security;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class LogUserLogin
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        Log::channel('security')->info(
            'User login successful',
            [
                'user_id' => $event->user->id,
                'user_email' => $event->user->email,
                'user_name' => $event->user->name,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'timestamp' => now(),
            ]
        );
    }
}
