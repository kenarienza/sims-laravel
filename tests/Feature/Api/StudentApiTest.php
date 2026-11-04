<?php

namespace Tests\Feature\Api;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_requests_are_rejected(): void
    {
        $this->getJson('/api/students')->assertUnauthorized();
    }

    public function test_it_lists_students(): void
    {
        $user = User::factory()->create();
        Student::factory(3)->create();

        $this->actingAs($user, 'sanctum')
            ->getJson('/api/students')
            ->assertOk()
            ->assertJsonCount(3, 'data');
    }

    public function test_it_creates_a_student(): void
    {
        $user = User::factory()->admin()->create();

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/students', [
            'student_number' => 'S00-0001',
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'juan@example.com',
            'course' => 'BSIT',
            'year_level' => 1,
        ]);

        $response->assertCreated()
            ->assertJsonPath('data.student_number', 'S00-0001');

        $this->assertDatabaseHas('students', ['student_number' => 'S00-0001']);
    }

    public function test_it_validates_student_creation(): void
    {
        $user = User::factory()->admin()->create();

        $this->actingAs($user, 'sanctum')->postJson('/api/students', [
            'student_number' => '',
            'email' => 'not-an-email',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['student_number', 'first_name', 'last_name', 'email', 'course', 'year_level']);
    }

    public function test_it_updates_a_student(): void
    {
        $user = User::factory()->admin()->create();
        $student = Student::factory()->create(['course' => 'BSIT']);

        $this->actingAs($user, 'sanctum')->putJson("/api/students/{$student->id}", [
            'student_number' => $student->student_number,
            'first_name' => $student->first_name,
            'last_name' => $student->last_name,
            'email' => $student->email,
            'course' => 'BSCS',
            'year_level' => $student->year_level,
        ])->assertOk()->assertJsonPath('data.course', 'BSCS');
    }

    public function test_it_deletes_a_student(): void
    {
        $user = User::factory()->admin()->create();
        $student = Student::factory()->create();

        $this->actingAs($user, 'sanctum')->deleteJson("/api/students/{$student->id}")
            ->assertNoContent();

        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
