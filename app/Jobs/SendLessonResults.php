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

    protected $grade;

    /**
     * Create a new job instance.
     */
    public function __construct($grade)
    {
        $this->grade = $grade;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->grade->student->email)->send(new SendLessonNotification($this->grade));
    }
}
