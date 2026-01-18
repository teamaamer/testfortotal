<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Admin User',
                    'avatar' => 'avatar.png',
                    'status' => 'active',
                    'mobile' => '+1234567890',
                    'summary' => 'System administrator with full access to the platform.',
                    'city' => 'New York',
                    'country' => 'USA',
                ]
            ],
            [
                'email' => 'academy1@example.com',
                'role' => 'academy',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Medical Training Academy',
                    'avatar' => 'avatar2.png',
                    'status' => 'active',
                    'mobile' => '+1234567891',
                    'summary' => 'Leading medical training institution offering comprehensive wellness and medical courses.',
                    'city' => 'London',
                    'country' => 'UK',
                    'organization_name' => 'International Medical Training Institute',
                ]
            ],
            [
                'email' => 'academy2@example.com',
                'role' => 'academy',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Wellness Education Center',
                    'avatar' => 'avatar3.png',
                    'status' => 'active',
                    'mobile' => '+1234567892',
                    'summary' => 'Specialized in holistic wellness and integrative medicine education.',
                    'city' => 'Toronto',
                    'country' => 'Canada',
                    'organization_name' => 'Global Wellness Academy',
                ]
            ],
            [
                'email' => 'center1@example.com',
                'role' => 'center',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'City Medical Center',
                    'avatar' => 'avatar4.png',
                    'status' => 'active',
                    'mobile' => '+1234567893',
                    'summary' => 'Premier medical center seeking qualified healthcare professionals.',
                    'city' => 'Dubai',
                    'country' => 'UAE',
                    'organization_name' => 'Dubai Healthcare Group',
                ]
            ],
            [
                'email' => 'center2@example.com',
                'role' => 'center',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Regional Hospital',
                    'avatar' => 'avatar5.png',
                    'status' => 'active',
                    'mobile' => '+1234567894',
                    'summary' => 'Multi-specialty hospital with state-of-the-art facilities.',
                    'city' => 'Sydney',
                    'country' => 'Australia',
                    'organization_name' => 'Sydney Regional Medical',
                ]
            ],
            [
                'email' => 'student1@example.com',
                'role' => 'student',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Dr. Sarah Johnson',
                    'avatar' => 'avatar.png',
                    'status' => 'active',
                    'mobile' => '+1234567895',
                    'summary' => 'Dermatologist with 5 years of experience seeking professional development opportunities.',
                    'city' => 'Boston',
                    'country' => 'USA',
                    'job_title' => 'Specialist',
                    'degree' => 'Board',
                    'specialty' => 'Dermatology',
                    'state_of_license' => 'Active',
                    'certifying_board' => 'American Board',
                    'department' => 'Dermatology',
                ]
            ],
            [
                'email' => 'student2@example.com',
                'role' => 'student',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Dr. Ahmed Al-Rashid',
                    'avatar' => 'avatar2.png',
                    'status' => 'active',
                    'mobile' => '+1234567896',
                    'summary' => 'Plastic surgeon interested in advanced aesthetic procedures and continuous learning.',
                    'city' => 'Riyadh',
                    'country' => 'Saudi Arabia',
                    'job_title' => 'Consultant',
                    'degree' => 'Fellowship',
                    'specialty' => 'Plastic Surgery',
                    'state_of_license' => 'Active',
                    'certifying_board' => 'Saudi Board',
                    'department' => 'Plastic Surgery',
                ]
            ],
            [
                'email' => 'student3@example.com',
                'role' => 'student',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Dr. Maria Garcia',
                    'avatar' => 'avatar3.png',
                    'status' => 'active',
                    'mobile' => '+1234567897',
                    'summary' => 'General practitioner with passion for family medicine and community health.',
                    'city' => 'Madrid',
                    'country' => 'Spain',
                    'job_title' => 'Senior',
                    'degree' => 'Master',
                    'specialty' => 'GP',
                    'state_of_license' => 'Active',
                    'certifying_board' => 'Other',
                    'department' => 'General Practice',
                ]
            ],
            [
                'email' => 'student4@example.com',
                'role' => 'student',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Dr. John Smith',
                    'avatar' => 'avatar4.png',
                    'status' => 'active',
                    'mobile' => '+1234567898',
                    'summary' => 'ENT specialist looking for career advancement and specialized training.',
                    'city' => 'Chicago',
                    'country' => 'USA',
                    'job_title' => 'Senior Specialist',
                    'degree' => 'Doctorate',
                    'specialty' => 'ENT',
                    'state_of_license' => 'Active',
                    'certifying_board' => 'American Board',
                    'department' => 'ENT',
                ]
            ],
            [
                'email' => 'student5@example.com',
                'role' => 'student',
                'password' => Hash::make('123456'),
                'account' => [
                    'name' => 'Dr. Li Wei',
                    'avatar' => 'avatar5.png',
                    'status' => 'active',
                    'mobile' => '+1234567899',
                    'summary' => 'Dentist specializing in cosmetic dentistry and oral surgery.',
                    'city' => 'Singapore',
                    'country' => 'Singapore',
                    'job_title' => 'Consultant',
                    'degree' => 'MBChB',
                    'specialty' => 'Dentistry',
                    'state_of_license' => 'Active',
                    'certifying_board' => 'None of the above',
                    'department' => 'Dental',
                ]
            ],
        ];

        foreach ($users as $userData) {
            $accountData = $userData['account'];
            unset($userData['account']);

            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );

            Account::firstOrCreate(
                ['user_id' => $user->id],
                array_merge($accountData, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        $this->command->info('Users and accounts seeded successfully.');
    }
}
