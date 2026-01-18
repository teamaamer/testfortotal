<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Account;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::all();
        $studentAccounts = Account::whereHas('user', function ($query) {
            $query->where('role', 'student');
        })->get();

        if ($courses->isEmpty() || $studentAccounts->isEmpty()) {
            $this->command->warn('No courses or student accounts found. Please run CoursesSeeder and UsersSeeder first.');
            return;
        }

        $comments = [
            'Excellent course! The content was well-structured and the instructor was very knowledgeable.',
            'Great learning experience. I highly recommend this course to anyone in the field.',
            'Very informative and practical. The hands-on sessions were particularly valuable.',
            'Outstanding course material. Worth every penny!',
            'The instructor explained complex topics in an easy-to-understand manner.',
            'This course exceeded my expectations. Highly professional and comprehensive.',
            'Fantastic course! I learned so much and can already apply it in my practice.',
            'Well organized and delivered. The course materials are excellent reference resources.',
            'Very engaging and interactive. Great networking opportunities with other professionals.',
            'Highly recommend! The practical demonstrations were incredibly helpful.',
            'Comprehensive coverage of the subject matter. Very satisfied with this course.',
            'The course provided valuable insights and updated knowledge in the field.',
            'Excellent value for money. The certification is a great addition to my credentials.',
            'Professional and well-executed course. The support team was also very helpful.',
            'This course has significantly enhanced my skills and confidence.',
            'Great course content with real-world applications. Very practical approach.',
            'The instructor\'s expertise really shines through. Learned a lot!',
            'Well worth the investment. I would definitely take more courses from this academy.',
            'Impressive course structure and delivery. Highly educational.',
            'Very pleased with the quality of instruction and course materials.',
        ];

        foreach ($courses as $course) {
            $numberOfComments = rand(2, 5);
            
            for ($i = 0; $i < $numberOfComments; $i++) {
                $randomStudent = $studentAccounts->random();
                $randomComment = $comments[array_rand($comments)];
                
                Comment::firstOrCreate(
                    [
                        'course_id' => $course->id,
                        'account_id' => $randomStudent->id,
                        'comment' => $randomComment,
                    ]
                );
            }
        }

        $this->command->info('Comments seeded successfully.');
    }
}
