<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnrollmentManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_enroll_a_student_in_a_subject(): void
    {
        $admin = User::factory()->admin()->create();
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();

        $response = $this->actingAs($admin)->post(route('enrollments.store'), [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'school_year' => '2025-2026',
            'semester' => '1st Semester',
            'status' => 'enrolled',
        ]);

        $response->assertRedirect(route('enrollments.index'));
        $this->assertDatabaseHas('enrollments', [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
        ]);
    }

    public function test_a_student_cannot_be_enrolled_twice_in_the_same_subject_and_term(): void
    {
        $admin = User::factory()->admin()->create();
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();

        $payload = [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'school_year' => '2025-2026',
            'semester' => '1st Semester',
            'status' => 'enrolled',
        ];

        $this->actingAs($admin)->post(route('enrollments.store'), $payload);
        $response = $this->actingAs($admin)->post(route('enrollments.store'), $payload);

        $response->assertSessionHasErrors('student_id');
        $this->assertDatabaseCount('enrollments', 1);
    }

    public function test_the_same_student_can_enroll_in_the_same_subject_a_different_semester(): void
    {
        $admin = User::factory()->admin()->create();
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();

        $this->actingAs($admin)->post(route('enrollments.store'), [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'school_year' => '2025-2026',
            'semester' => '1st Semester',
            'status' => 'enrolled',
        ]);

        $response = $this->actingAs($admin)->post(route('enrollments.store'), [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'school_year' => '2025-2026',
            'semester' => '2nd Semester',
            'status' => 'enrolled',
        ]);

        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseCount('enrollments', 2);
    }

    public function test_admin_can_remove_an_enrollment(): void
    {
        $admin = User::factory()->admin()->create();
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();

        $this->actingAs($admin)->post(route('enrollments.store'), [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'school_year' => '2025-2026',
            'semester' => '1st Semester',
            'status' => 'enrolled',
        ]);

        $enrollment = $student->enrollments()->first();

        $this->actingAs($admin)->delete(route('enrollments.destroy', $enrollment))
            ->assertRedirect(route('enrollments.index'));

        $this->assertDatabaseMissing('enrollments', ['id' => $enrollment->id]);
    }
}
