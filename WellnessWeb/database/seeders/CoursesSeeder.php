<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Account;
use Carbon\Carbon;

class CoursesSeeder extends Seeder
{
    public function run(): void
    {
        $academyAccounts = Account::whereHas('user', function ($query) {
            $query->where('role', 'academy');
        })->get();

        if ($academyAccounts->isEmpty()) {
            $this->command->warn('No academy accounts found. Please run UsersSeeder first.');
            return;
        }

        $courses = [
            [
                'title' => 'Advanced Dermatology Techniques',
                'image' => '../uploads/courses/16.jpg',
                'start_on' => Carbon::now()->addDays(15),
                'status' => 'active',
                'summary' => 'Master advanced dermatological procedures and latest treatment methods.',
                'full_summary' => 'This comprehensive course covers advanced dermatological techniques including laser treatments, chemical peels, and innovative skin care procedures. Learn from industry experts and gain hands-on experience with cutting-edge technology.',
                'requirements' => 'Medical degree, Basic dermatology knowledge, 2+ years experience',
                'price' => 1299.99,
            ],
            [
                'title' => 'Aesthetic Medicine Masterclass',
                'image' => '../uploads/courses/17.jpg',
                'start_on' => Carbon::now()->addDays(30),
                'status' => 'active',
                'summary' => 'Comprehensive training in aesthetic procedures and cosmetic treatments.',
                'full_summary' => 'Explore the world of aesthetic medicine with this intensive masterclass. Topics include botox, fillers, non-surgical facelifts, and patient consultation techniques. Perfect for physicians looking to expand their practice.',
                'requirements' => 'Medical license, Interest in aesthetic medicine',
                'price' => 1599.99,
            ],
            [
                'title' => 'Wellness and Integrative Medicine',
                'image' => '../uploads/courses/16.jpg',
                'start_on' => Carbon::now()->addDays(20),
                'status' => 'active',
                'summary' => 'Holistic approach to patient care combining traditional and modern medicine.',
                'full_summary' => 'Learn to integrate conventional medical practices with complementary therapies. This course covers nutrition, stress management, preventive care, and patient-centered treatment approaches.',
                'requirements' => 'Healthcare professional certification',
                'price' => 899.99,
            ],
            [
                'title' => 'Plastic Surgery Fundamentals',
                'image' => '../uploads/courses/17.jpg',
                'start_on' => Carbon::now()->addDays(45),
                'status' => 'active',
                'summary' => 'Essential techniques and principles in plastic and reconstructive surgery.',
                'full_summary' => 'A foundational course covering basic plastic surgery techniques, patient assessment, surgical planning, and post-operative care. Includes both cosmetic and reconstructive procedures.',
                'requirements' => 'Surgical residency, Board certification preferred',
                'price' => 2499.99,
            ],
            [
                'title' => 'Family Medicine Update 2026',
                'image' => '../uploads/courses/16.jpg',
                'start_on' => Carbon::now()->addDays(10),
                'status' => 'active',
                'summary' => 'Latest developments and best practices in family medicine.',
                'full_summary' => 'Stay current with the latest evidence-based practices in family medicine. Topics include chronic disease management, preventive care guidelines, and emerging treatment protocols.',
                'requirements' => 'Medical degree, Family medicine interest',
                'price' => 699.99,
            ],
            [
                'title' => 'ENT Surgical Techniques',
                'image' => '../uploads/courses/17.jpg',
                'start_on' => Carbon::now()->addDays(60),
                'status' => 'active',
                'summary' => 'Advanced surgical procedures for ear, nose, and throat conditions.',
                'full_summary' => 'Master advanced ENT surgical techniques including endoscopic sinus surgery, tympanoplasty, and laryngeal procedures. Hands-on training with experienced surgeons.',
                'requirements' => 'ENT residency or fellowship, Surgical experience',
                'price' => 1899.99,
            ],
            [
                'title' => 'Dental Implantology Certification',
                'image' => '../uploads/courses/16.jpg',
                'start_on' => Carbon::now()->addDays(25),
                'status' => 'active',
                'summary' => 'Complete training in dental implant placement and restoration.',
                'full_summary' => 'Comprehensive certification program covering all aspects of dental implantology from diagnosis to final restoration. Includes live patient demonstrations and supervised practice.',
                'requirements' => 'Dental degree, General dentistry experience',
                'price' => 3299.99,
            ],
            [
                'title' => 'Emergency Medicine Protocols',
                'image' => '../uploads/courses/17.jpg',
                'start_on' => Carbon::now()->addDays(5),
                'status' => 'active',
                'summary' => 'Critical care and emergency response training for medical professionals.',
                'full_summary' => 'Intensive training in emergency medicine protocols, trauma care, and critical decision-making. Learn to handle high-pressure situations with confidence.',
                'requirements' => 'Medical license, ACLS certification',
                'price' => 1199.99,
            ],
            [
                'title' => 'Pediatric Care Excellence',
                'image' => '../uploads/courses/16.jpg',
                'start_on' => Carbon::now()->addDays(35),
                'status' => 'new',
                'summary' => 'Specialized training in pediatric medicine and child healthcare.',
                'full_summary' => 'Focus on pediatric assessment, common childhood illnesses, vaccination protocols, and family-centered care approaches. Perfect for physicians working with children.',
                'requirements' => 'Medical degree, Interest in pediatrics',
                'price' => 999.99,
            ],
            [
                'title' => 'Medical Leadership and Management',
                'image' => '../uploads/courses/17.jpg',
                'start_on' => Carbon::now()->addDays(40),
                'status' => 'active',
                'summary' => 'Develop leadership skills for healthcare administration and team management.',
                'full_summary' => 'Learn essential leadership and management skills for healthcare settings. Topics include team building, conflict resolution, resource management, and strategic planning.',
                'requirements' => 'Healthcare professional, Management interest',
                'price' => 799.99,
            ],
        ];

        foreach ($courses as $index => $courseData) {
            $account = $academyAccounts[$index % $academyAccounts->count()];
            
            Course::firstOrCreate(
                [
                    'title' => $courseData['title'],
                    'account_id' => $account->id,
                ],
                array_merge($courseData, [
                    'account_id' => $account->id,
                ])
            );
        }

        $this->command->info('Courses seeded successfully.');
    }
}
