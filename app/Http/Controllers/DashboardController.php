<?php

namespace App\Http\Controllers;

use App\Enums\EnrollmentStatus;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        if (Auth::user()->isStudent()) {
            $student = Auth::user()->student()->with('enrollments.subject')->firstOrFail();

            return view('student.portal', compact('student'));
        }

        $stats = [
            'total_students' => Student::count(),
            'total_subjects' => Subject::count(),
            'total_enrollments' => Enrollment::count(),
            'active_enrollments' => Enrollment::where('status', EnrollmentStatus::Enrolled)->count(),
            'students_by_year' => Student::selectRaw('year_level, count(*) as total')
                ->groupBy('year_level')
                ->orderBy('year_level')
                ->pluck('total', 'year_level'),
            'students_by_course' => Student::selectRaw('course, count(*) as total')
                ->groupBy('course')
                ->orderByDesc('total')
                ->pluck('total', 'course'),
        ];

        $recentEnrollments = Auth::user()->isAdmin()
            ? Enrollment::with(['student', 'subject'])->latest()->take(6)->get()
            : null;

        return view('dashboard', compact('stats', 'recentEnrollments'));
    }
}
