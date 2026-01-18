<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactRequest;
use App\Models\Account;
use App\Models\Device;

class ContactRequestsSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = Account::all();
        $devices = Device::all();

        if ($accounts->isEmpty()) {
            $this->command->warn('No accounts found. Please run UsersSeeder first.');
            return;
        }

        $contactTypes = ['trade_in', 'support', 'contact'];
        $problemTypes = ['Customer Services', 'Custom-made Courses', 'Market Research', 'Others'];
        
        $messages = [
            'I would like to inquire about your services and pricing options.',
            'I am experiencing technical issues with the platform. Please assist.',
            'Great service! I wanted to provide positive feedback on my recent experience.',
            'I have a question regarding the certification process.',
            'Could you please provide more information about upcoming courses?',
            'I need assistance with my account settings.',
            'The course materials are excellent. Thank you for the quality content.',
            'I would like to schedule a consultation regarding career opportunities.',
            'Please help me with the payment process for course enrollment.',
            'I am interested in partnership opportunities with your organization.',
        ];

        $cities = ['Dubai', 'Sydney', 'New York', 'London', 'Toronto', 'Singapore', 'Madrid', 'Boston'];
        $countries = ['UAE', 'Australia', 'USA', 'UK', 'Canada', 'Singapore', 'Spain', 'USA'];

        foreach ($accounts->take(15) as $index => $account) {
            $cityIndex = $index % count($cities);
            
            ContactRequest::create([
                'account_id' => $account->id,
                'device_id' => $devices->isNotEmpty() ? $devices->random()->id : null,
                'target_device_id' => $devices->isNotEmpty() && rand(0, 1) ? $devices->random()->id : null,
                'message' => $messages[array_rand($messages)],
                'phone' => '+' . rand(1, 9) . rand(100000000, 999999999),
                'email' => $account->user->email,
                'name' => $account->name,
                'type' => $contactTypes[array_rand($contactTypes)],
                'problem_type' => $problemTypes[array_rand($problemTypes)],
                'city' => $cities[$cityIndex],
                'country' => $countries[$cityIndex],
            ]);
        }

        $this->command->info('Contact requests seeded successfully.');
    }
}
