<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobApplication;
use App\Models\Career;
use App\Models\Account;

class JobApplicationsSeeder extends Seeder
{
    public function run(): void
    {
        $careers = Career::all();
        $studentAccounts = Account::whereHas('user', function ($query) {
            $query->where('role', 'student');
        })->get();

        if ($careers->isEmpty() || $studentAccounts->isEmpty()) {
            $this->command->warn('No careers or student accounts found. Please run CareersSeeder and UsersSeeder first.');
            return;
        }

        foreach ($careers as $career) {
            $numberOfApplications = rand(1, 4);
            $applicants = $studentAccounts->random(min($numberOfApplications, $studentAccounts->count()));
            
            foreach ($applicants as $applicant) {
                JobApplication::firstOrCreate([
                    'account_id' => $applicant->id,
                    'career_id' => $career->id,
                ]);
            }
        }

        $this->command->info('Job applications seeded successfully.');
    }
}
