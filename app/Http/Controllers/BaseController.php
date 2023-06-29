<?php

namespace App\Http\Controllers;

use App\Models\StudentsGrades;
use App\Services\GradesService;
use Illuminate\Routing\Controller;


class BaseController extends Controller
{
    public $service;
    public $grades;

    public function __construct(GradesService $service, StudentsGrades $grades) {
        $this->service = $service;
        $this->grades = $grades;
    }
}
