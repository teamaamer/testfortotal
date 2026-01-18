<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\Account;

class DocumentsSeeder extends Seeder
{
    public function run(): void
    {
        $studentAccounts = Account::whereHas('user', function ($query) {
            $query->where('role', 'student');
        })->get();

        if ($studentAccounts->isEmpty()) {
            $this->command->warn('No student accounts found. Please run UsersSeeder first.');
            return;
        }

        $documentTypes = ['cv', 'certificate', 'license', 'transcript', 'other'];
        $documentTitles = [
            'cv' => ['Professional Resume', 'Updated CV', 'Career Summary', 'Curriculum Vitae', 'Professional CV', 'Academic CV'],
            'certificate' => ['Board Certification', 'Medical License', 'Specialty Certificate', 'Training Certificate'],
            'license' => ['Medical License', 'State License', 'Practice License'],
            'transcript' => ['Medical School Transcript', 'Residency Transcript', 'Fellowship Records'],
            'other' => ['Professional Portfolio', 'Reference Letters', 'Research Papers'],
        ];

        foreach ($studentAccounts as $account) {
            $numberOfDocuments = rand(2, 5);
            
            for ($i = 0; $i < $numberOfDocuments; $i++) {
                $type = $documentTypes[array_rand($documentTypes)];
                $titles = $documentTitles[$type];
                $title = $titles[array_rand($titles)];
                
                Document::firstOrCreate(
                    [
                        'account_id' => $account->id,
                        'title' => $title,
                        'type' => $type,
                    ],
                    [
                        'file_path' => 'documents/' . strtolower(str_replace(' ', '_', $title)) . '_' . $account->id . '.pdf',
                    ]
                );
            }
        }

        $this->command->info('Documents seeded successfully.');
    }
}
