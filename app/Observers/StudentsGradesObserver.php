<?php

namespace App\Observers;

use App\Jobs\SendLessonResults;
use App\Models\StudentsGrades;

class StudentsGradesObserver
{
    /**
     * Handle the Lessons "created" event.
     */
    public function created(StudentsGrades $grade): void
    {
        SendLessonResults::dispatch($grade);
    }
}
