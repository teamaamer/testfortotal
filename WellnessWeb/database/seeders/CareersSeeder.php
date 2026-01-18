<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Career;
use App\Models\Account;

class CareersSeeder extends Seeder
{
    public function run(): void
    {
        $centerAccounts = Account::whereHas('user', function ($query) {
            $query->where('role', 'center');
        })->get();

        if ($centerAccounts->isEmpty()) {
            $this->command->warn('No center accounts found. Please run UsersSeeder first.');
            return;
        }

        $careers = [
            [
                'title' => 'Senior Dermatologist',
                'city' => 'Dubai',
                'country' => 'UAE',
                'status' => 'active',
                'summary' => 'Seeking experienced dermatologist for our state-of-the-art medical center. Competitive salary and benefits package. Must have board certification and minimum 5 years experience.',
                'salary' => 15000.00,
            ],
            [
                'title' => 'Plastic Surgeon - Consultant Level',
                'city' => 'Sydney',
                'country' => 'Australia',
                'status' => 'active',
                'summary' => 'Premier hospital seeking consultant plastic surgeon specializing in cosmetic and reconstructive procedures. Excellent facilities and support staff.',
                'salary' => 18000.00,
            ],
            [
                'title' => 'General Practitioner',
                'city' => 'Dubai',
                'country' => 'UAE',
                'status' => 'active',
                'summary' => 'Family medicine physician needed for busy clinic. Flexible schedule, modern equipment, and supportive team environment.',
                'salary' => 8000.00,
            ],
            [
                'title' => 'ENT Specialist',
                'city' => 'Sydney',
                'country' => 'Australia',
                'status' => 'active',
                'summary' => 'Experienced ENT specialist required for multi-specialty hospital. Must be proficient in endoscopic procedures and have excellent patient care skills.',
                'salary' => 12000.00,
            ],
            [
                'title' => 'Emergency Medicine Physician',
                'city' => 'Dubai',
                'country' => 'UAE',
                'status' => 'active',
                'summary' => 'Join our dynamic emergency department team. 24/7 facility with advanced trauma capabilities. ACLS and ATLS certification required.',
                'salary' => 13000.00,
            ],
            [
                'title' => 'Pediatrician',
                'city' => 'Sydney',
                'country' => 'Australia',
                'status' => 'active',
                'summary' => 'Compassionate pediatrician wanted for children\'s hospital. Work with a dedicated team providing comprehensive care to young patients.',
                'salary' => 10000.00,
            ],
            [
                'title' => 'Dental Surgeon',
                'city' => 'Dubai',
                'country' => 'UAE',
                'status' => 'active',
                'summary' => 'Modern dental clinic seeking skilled dental surgeon. Specialization in implantology or cosmetic dentistry preferred. Latest technology available.',
                'salary' => 9000.00,
            ],
            [
                'title' => 'Consultant Anesthesiologist',
                'city' => 'Sydney',
                'country' => 'Australia',
                'status' => 'active',
                'summary' => 'Experienced anesthesiologist needed for surgical center. Must be comfortable with various anesthesia techniques and critical care.',
                'salary' => 14000.00,
            ],
            [
                'title' => 'Orthopedic Surgeon',
                'city' => 'Dubai',
                'country' => 'UAE',
                'status' => 'new',
                'summary' => 'Orthopedic surgeon with sports medicine expertise. Join our growing orthopedic department with access to advanced imaging and surgical equipment.',
                'salary' => 16000.00,
            ],
            [
                'title' => 'Radiologist',
                'city' => 'Sydney',
                'country' => 'Australia',
                'status' => 'active',
                'summary' => 'Diagnostic radiologist for imaging center. Experience with MRI, CT, and ultrasound interpretation required. Teleradiology options available.',
                'salary' => 11000.00,
            ],
            [
                'title' => 'Cardiologist',
                'city' => 'Dubai',
                'country' => 'UAE',
                'status' => 'active',
                'summary' => 'Interventional cardiologist wanted for cardiac center. State-of-the-art cath lab and comprehensive cardiology services.',
                'salary' => 17000.00,
            ],
            [
                'title' => 'Psychiatrist',
                'city' => 'Sydney',
                'country' => 'Australia',
                'status' => 'active',
                'summary' => 'Mental health professional for outpatient clinic. Focus on adult psychiatry with integrated care approach.',
                'salary' => 9500.00,
            ],
        ];

        foreach ($careers as $index => $careerData) {
            $account = $centerAccounts[$index % $centerAccounts->count()];
            
            Career::firstOrCreate(
                [
                    'title' => $careerData['title'],
                    'account_id' => $account->id,
                ],
                array_merge($careerData, [
                    'account_id' => $account->id,
                ])
            );
        }

        $this->command->info('Careers seeded successfully.');
    }
}
