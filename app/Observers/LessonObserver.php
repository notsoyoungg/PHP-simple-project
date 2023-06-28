<?php

namespace App\Observers;

use App\Jobs\SendLessonResults;
use App\Mail\SendLessonNotification;
use App\Models\Lessons;
use Illuminate\Support\Facades\Mail;

class LessonObserver
{
    /**
     * Handle the Lessons "created" event.
     */
    public function created(Lessons $lessons): void
    {
//        Mail::to($lessons->student->email)->send(new SendLessonNotification($lessons));
        SendLessonResults::dispatch($lessons);
    }
}
