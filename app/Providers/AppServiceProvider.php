<?php

namespace App\Providers;

use App\Models\Grade;
use App\Observers\StudentGradeObserver;
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
        Grade::observe(StudentGradeObserver::class);
    }
}
