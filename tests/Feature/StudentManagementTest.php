<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('students.index'))->assertRedirect(route('login'));
    }

    public function test_admin_can_view_the_student_list(): void
    {
        $admin = User::factory()->admin()->create();
        Student::factory(3)->create();

        $this->actingAs($admin)
            ->get(route('students.index'))
            ->assertOk()
            ->assertSee('Add Student');
    }

    public function test_staff_can_view_but_not_add_students(): void
    {
        $staff = User::factory()->create();

        $this->actingAs($staff)
            ->get(route('students.index'))
            ->assertOk()
            ->assertDontSee('Add Student');

        $this->actingAs($staff)
            ->get(route('students.create'))
            ->assertForbidden();
    }

    public function test_admin_can_create_a_student(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->post(route('students.store'), [
            'student_number' => 'S00-0001',
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'juan@example.com',
            'course' => 'BSIT',
            'year_level' => 1,
        ]);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', ['student_number' => 'S00-0001']);
    }

    public function test_creating_a_student_requires_a_unique_student_number(): void
    {
        $admin = User::factory()->admin()->create();
        Student::factory()->create(['student_number' => 'S00-0001']);

        $this->actingAs($admin)->post(route('students.store'), [
            'student_number' => 'S00-0001',
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'juan2@example.com',
            'course' => 'BSIT',
            'year_level' => 1,
        ])->assertSessionHasErrors('student_number');

        $this->assertDatabaseCount('students', 1);
    }

    public function test_creating_a_student_requires_a_valid_email(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)->post(route('students.store'), [
            'student_number' => 'S00-0001',
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'not-an-email',
            'course' => 'BSIT',
            'year_level' => 1,
        ])->assertSessionHasErrors('email');
    }

    public function test_admin_can_update_a_student(): void
    {
        $admin = User::factory()->admin()->create();
        $student = Student::factory()->create(['course' => 'BSIT']);

        $this->actingAs($admin)->put(route('students.update', $student), [
            'student_number' => $student->student_number,
            'first_name' => $student->first_name,
            'last_name' => $student->last_name,
            'email' => $student->email,
            'course' => 'BSCS',
            'year_level' => $student->year_level,
        ])->assertRedirect(route('students.index'));

        $this->assertDatabaseHas('students', ['id' => $student->id, 'course' => 'BSCS']);
    }

    public function test_admin_can_delete_a_student(): void
    {
        $admin = User::factory()->admin()->create();
        $student = Student::factory()->create();

        $this->actingAs($admin)->delete(route('students.destroy', $student))
            ->assertRedirect(route('students.index'));

        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }

    public function test_staff_cannot_delete_a_student(): void
    {
        $staff = User::factory()->create();
        $student = Student::factory()->create();

        $this->actingAs($staff)->delete(route('students.destroy', $student))
            ->assertForbidden();

        $this->assertDatabaseHas('students', ['id' => $student->id]);
    }
}
