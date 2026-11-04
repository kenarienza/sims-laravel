<?php

namespace App\Http\Controllers;

use App\Enums\EnrollmentStatus;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_students' => Student::count(),
            'total_subjects' => Subject::count(),
            'total_enrollments' => Enrollment::count(),
            'active_enrollments' => Enrollment::where('status', EnrollmentStatus::Enrolled)->count(),
            'students_by_year' => Student::selectRaw('year_level, count(*) as total')
                ->groupBy('year_level')
                ->orderBy('year_level')
                ->pluck('total', 'year_level'),
        ];

        return view('dashboard', compact('stats'));
    }
}
