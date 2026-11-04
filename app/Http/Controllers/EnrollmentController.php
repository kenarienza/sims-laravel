<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    public function index(): View
    {
        $enrollments = Enrollment::query()
            ->with(['student', 'subject'])
            ->latest()
            ->paginate(10);

        return view('enrollments.index', compact('enrollments'));
    }

    public function create(): View
    {
        $students = Student::orderBy('last_name')->get();
        $subjects = Subject::orderBy('subject_code')->get();

        return view('enrollments.create', compact('students', 'subjects'));
    }

    public function store(StoreEnrollmentRequest $request): RedirectResponse
    {
        Enrollment::create($request->validated());

        return redirect()->route('enrollments.index')->with('status', 'Student enrolled successfully.');
    }

    public function edit(Enrollment $enrollment): View
    {
        $students = Student::orderBy('last_name')->get();
        $subjects = Subject::orderBy('subject_code')->get();

        return view('enrollments.edit', compact('enrollment', 'students', 'subjects'));
    }

    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment): RedirectResponse
    {
        $enrollment->update($request->validated());

        return redirect()->route('enrollments.index')->with('status', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment): RedirectResponse
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('status', 'Enrollment removed successfully.');
    }
}
