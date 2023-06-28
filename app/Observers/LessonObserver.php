<?php

namespace App\Observers;

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
//        dump($lessons);
//        dump($lessons->subject->name);
//        dump($lessons->updated_at->format('d-m-Y'));
//        dd($lessons->student->email);
//        dump('Урок завершен');
        Mail::to($lessons->student->email)->send(new SendLessonNotification($lessons));
    }
}
