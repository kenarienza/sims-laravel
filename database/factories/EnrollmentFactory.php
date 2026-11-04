<?php

namespace Database\Factories;

use App\Enums\EnrollmentStatus;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'subject_id' => Subject::factory(),
            'school_year' => '2025-2026',
            'semester' => fake()->randomElement(['1st Semester', '2nd Semester']),
            'status' => EnrollmentStatus::Enrolled,
        ];
    }
}
