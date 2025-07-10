<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// 🔹 Optional fun command
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\DeleteEmptyComments;

app(Schedule::class)->command(DeleteEmptyComments::class)->everyMinute();
