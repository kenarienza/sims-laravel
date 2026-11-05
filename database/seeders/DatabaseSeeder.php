<?php

namespace Database\Seeders;

use App\Enums\EnrollmentStatus;
use App\Enums\Role;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        $roster = [
            ['Ace', 'Raz', 'Cabuga'],
            ['Christian James', 'T.', 'Castillo'],
            ['Christopher', 'Pardinas', 'Jabagat'],
            ['Errof', 'Rubic', 'Sabanal'],
            ['Eugene Rey', 'C.', 'Magoncia'],
            ['Grace', 'M.', 'Penido'],
            ['Gie-mar', null, 'Roche'],
            ['Jahs', 'Caluag', 'Morate'],
            ['Joseph', 'Beri', 'Barrot'],
            ['Joy', 'V.', 'Garcia'],
            ['Junex', 'D.', 'Bandoy'],
            ['Kenneth', 'A.', 'Dayo'],
            ['Marcuel', 'Lico', 'Gubaynon'],
            ['Mario', 'B.', 'Caday'],
            ['Marlon Jhun', 'M.', 'Timogan'],
            ['Paulo', 'A.', 'Duga'],
            ['Rexon', 'L.', 'Timbal'],
            ['Ronald', 'N.', 'Surita'],
            ['Ronald', 'P.', 'Limbaga'],
            ['Ronnel', 'A.', 'Falo'],
            ['Stephen Angelo', 'Astillero', 'Basanez'],
        ];

        $students = collect($roster)->map(function (array $name, int $index) {
            [$firstName, $middleName, $lastName] = $name;

            $emailHandle = Str::slug($firstName.' '.$lastName, '.');

            return Student::create([
                'student_number' => sprintf('S26-%04d', $index + 1),
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'last_name' => $lastName,
                'email' => $emailHandle.'@techacademy.edu',
                'course' => 'BSIT',
                'year_level' => 4,
            ]);
        });

        $subjects = collect([
            ['IT 401', 'Capstone Project 1', 3],
            ['IT 402', 'Capstone Project 2', 3],
            ['IT 403', 'Systems Integration and Architecture 2', 3],
            ['IT 404', 'Information Assurance and Security 2', 3],
            ['IT 405', 'System Administration and Maintenance', 3],
            ['IT 406', 'Platform Technologies', 3],
            ['IT 407', 'Social and Professional Issues in Computing', 3],
            ['IT 408', 'IT Elective 4 - Mobile Application Development', 3],
        ])->map(fn (array $subject) => Subject::create([
            'subject_code' => $subject[0],
            'subject_name' => $subject[1],
            'units' => $subject[2],
        ]));

        $students->each(function (Student $student) use ($subjects) {
            $subjects->random(random_int(2, 4))->each(function (Subject $subject) use ($student) {
                Enrollment::factory()->create([
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'status' => EnrollmentStatus::Enrolled,
                ]);
            });
        });

        // Give the first roster student a demo login so the Student portal can be tried out.
        $demoStudentRecord = $students->first();
        $demoStudentUser = User::factory()->create([
            'name' => $demoStudentRecord->fullName(),
            'first_name' => $demoStudentRecord->first_name,
            'last_name' => $demoStudentRecord->last_name,
            'email' => $demoStudentRecord->email,
            'role' => Role::Student,
        ]);
        $demoStudentRecord->update(['user_id' => $demoStudentUser->id]);

        $this->command?->info('Seeded admin: '.$admin->email.' / password: password');
        $this->command?->info('Seeded staff: '.$staff->email.' / password: password');
        $this->command?->info('Seeded student: '.$demoStudentUser->email.' / password: password');
    }
}
