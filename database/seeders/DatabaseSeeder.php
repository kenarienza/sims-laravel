<?php

namespace Database\Seeders;

use App\Enums\EnrollmentStatus;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->admin()->create([
            'name' => 'System Administrator',
            'email' => 'admin@sims.test',
        ]);

        $staff = User::factory()->create([
            'name' => 'Staff Member',
            'email' => 'staff@sims.test',
        ]);

        $students = Student::factory(15)->create();
        $subjects = Subject::factory(6)->create();

        $students->each(function (Student $student) use ($subjects) {
            $subjects->random(random_int(2, 4))->each(function (Subject $subject) use ($student) {
                Enrollment::factory()->create([
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'status' => EnrollmentStatus::Enrolled,
                ]);
            });
        });

        $this->command?->info('Seeded admin: '.$admin->email.' / password: password');
        $this->command?->info('Seeded staff: '.$staff->email.' / password: password');
    }
}
