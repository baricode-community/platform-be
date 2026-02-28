<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('backup:run')->daily()->at('01:30');
Schedule::command('backup:run')->daily()->at('09:30');
Schedule::command('backup:run')->daily()->at('17:30');

