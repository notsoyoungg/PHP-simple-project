<?php

namespace App\Providers;

use App\Models\StudentsGrades;
use App\Observers\StudentsGradesObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        StudentsGrades::observe(StudentsGradesObserver::class);
    }
}
