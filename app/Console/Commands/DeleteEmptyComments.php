<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Frequency;
use App\Models\Comment;

class DeleteEmptyComments extends Command
{
    protected $signature = 'comments:clean';
    protected $description = 'Delete comments with empty or null content';

    public function handle()
    {
        $deleted = Comment::whereNull('content')
            ->orWhere('content', '')
            ->delete();

        $this->info("Deleted {$deleted} empty comments.");
    }

    public function shouldBeScheduled(): bool
    {
        return true;
    }

    public function frequency(): Frequency
    {
        return Frequency::everyMinute();
    }
}