<?php

namespace App\Observers;

use App\Jobs\SendLessonResults;
use App\Models\Grade;

class StudentGradeObserver
{
    /**
     * Handle the Lessons "created" event.
     */
    public function created(Grade $grade): void
    {
        SendLessonResults::dispatch($grade);
    }
}
