<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_initial' => ['nullable', 'string', 'max:5'],
            'contact_number' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $middleInitial = $request->middle_initial ? rtrim($request->middle_initial, '.').'.' : null;

        $fullName = collect([$request->first_name, $middleInitial, $request->last_name])
            ->filter()
            ->implode(' ');

        $user = User::create([
            'name' => $fullName,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_initial' => $middleInitial,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => Role::Student,
        ]);

        // Link to an existing (not yet claimed) student record with a matching
        // email, e.g. one seeded from the official class roster. Otherwise,
        // create a fresh student record for this self-enrollment.
        $student = Student::whereNull('user_id')
            ->where('email', $request->email)
            ->first();

        if ($student) {
            $student->update(['user_id' => $user->id]);
        } else {
            Student::create([
                'user_id' => $user->id,
                'student_number' => $this->nextStudentNumber(),
                'first_name' => $request->first_name,
                'middle_name' => $middleInitial,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'course' => 'Not Yet Assigned',
                'year_level' => 1,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    private function nextStudentNumber(): string
    {
        $number = Student::count() + 1;
        $studentNumber = sprintf('S26-%04d', $number);

        while (Student::where('student_number', $studentNumber)->exists()) {
            $number++;
            $studentNumber = sprintf('S26-%04d', $number);
        }

        return $studentNumber;
    }
}
