<?php

namespace App\Jobs;

use App\Mail\SendLessonNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendLessonResults implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lesson;

    /**
     * Create a new job instance.
     */
    public function __construct($lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->lesson->student->email)->send(new SendLessonNotification($this->lesson));
    }
}
