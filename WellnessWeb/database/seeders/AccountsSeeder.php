<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'role' => 'admin',
                'password' => Hash::make('123456'), // Replace with the password you want
            ]
        );

        // Create the associated account if not exists
        Account::firstOrCreate(
            ['user_id' => $user->id],
            [
                'name' => 'Admin',
                'avatar' => 'avatar.png',
                'status' => 'active',
                // Add other fields as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $this->command->info('Admin user and account seeded successfully.');
    }
}
