<?php

namespace App\Listeners\General\Security;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;

class LogUserLogout
{
    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        Log::channel('security')->info(
            'User logout successful',
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
