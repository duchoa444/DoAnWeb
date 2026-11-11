<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tao 5 danh muc
        $categoryNames = [
            'Lap trinh',
            'Co so du lieu',
            'Thiet ke web',
            'Mang may tinh',
            'Phat trien phan mem',
        ];

        $categoryIds = [];

        foreach ($categoryNames as $name) {
            $category = DB::table('categories')
                ->where('name', $name)
                ->first();

            if (!$category) {
                $id = DB::table('categories')->insertGetId([
                    'name' => $name,
                    'description' => 'Danh muc ' . $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $id = $category->id;
            }

            $categoryIds[$name] = $id;
        }

        // 2. Tao 3 giao vien va 1 admin
        $teachers = [
            ['name' => 'Nguyen Van An', 'email' => 'teacher01@example.com'],
            ['name' => 'Tran Thi Binh', 'email' => 'teacher02@example.com'],
            ['name' => 'Le Van Cuong', 'email' => 'teacher03@example.com'],
        ];

        foreach ($teachers as $teacher) {
            User::updateOrCreate(
                ['email' => $teacher['email']],
                [
                    'name' => $teacher['name'],
                    'password' => '12345678',
                    'role' => 'teacher',
                ]
            );
        }

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => '12345678',
                'role' => 'admin',
            ]
        );

        // 3. Tao 15 hoc vien
        $students = [];

        for ($i = 1; $i <= 15; $i++) {
            $email = sprintf('student%02d@example.com', $i);

            $student = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => 'Hoc vien ' . $i,
                    'password' => '12345678',
                    'role' => 'student',
                ]
            );

            $students[] = $student;
        }

        // 4. Tao 8 khoa hoc
        $courseData = [
            [
                'title' => 'Lap trinh PHP co ban',
                'category' => 'Lap trinh',
                'teacher' => 'teacher01@example.com',
                'description' => 'Lam quen voi ngon ngu PHP.',
            ],
            [
                'title' => 'Lap trinh Laravel',
                'category' => 'Lap trinh',
                'teacher' => 'teacher02@example.com',
                'description' => 'Xay dung ung dung web bang Laravel.',
            ],
            [
                'title' => 'Lap trinh JavaScript',
                'category' => 'Lap trinh',
                'teacher' => 'teacher03@example.com',
                'description' => 'Kien thuc JavaScript co ban.',
            ],
            [
                'title' => 'SQL Server co ban',
                'category' => 'Co so du lieu',
                'teacher' => 'teacher01@example.com',
                'description' => 'Hoc truy van va quan ly du lieu.',
            ],
            [
                'title' => 'Thiet ke giao dien HTML CSS',
                'category' => 'Thiet ke web',
                'teacher' => 'teacher02@example.com',
                'description' => 'Xay dung giao dien website.',
            ],
            [
                'title' => 'Mang may tinh can ban',
                'category' => 'Mang may tinh',
                'teacher' => 'teacher03@example.com',
                'description' => 'Tim hieu kien thuc mang may tinh.',
            ],
            [
                'title' => 'Phan tich thiet ke phan mem',
                'category' => 'Phat trien phan mem',
                'teacher' => 'teacher01@example.com',
                'description' => 'Phan tich yeu cau va thiet ke he thong.',
            ],
            [
                'title' => 'Kiem thu phan mem',
                'category' => 'Phat trien phan mem',
                'teacher' => 'teacher02@example.com',
                'description' => 'Kien thuc kiem thu phan mem.',
            ],
        ];

        $courses = [];

        foreach ($courseData as $data) {
            $teacherId = User::where('email', $data['teacher'])->value('id');

            $course = DB::table('courses')
                ->where('title', $data['title'])
                ->first();

            $values = [
                'category_id' => $categoryIds[$data['category']],
                'teacher_id' => $teacherId,
                'title' => $data['title'],
                'description' => $data['description'],
                'quiz_minutes' => 30,
                'status' => 'public',
                'updated_at' => now(),
            ];

            if (!$course) {
                $values['created_at'] = now();
                $courseId = DB::table('courses')->insertGetId($values);
            } else {
                DB::table('courses')
                    ->where('id', $course->id)
                    ->update($values);

                $courseId = $course->id;
            }

            $courses[] = $courseId;
        }

        // 5. Tao 5 bai hoc cho moi khoa hoc
        foreach ($courses as $courseId) {
            for ($position = 1; $position <= 5; $position++) {
                $title = 'Bai hoc ' . $position;

                $lesson = DB::table('lessons')
                    ->where('course_id', $courseId)
                    ->where('position', $position)
                    ->first();

                $values = [
                    'title' => $title,
                    'content' => 'Noi dung mau cua bai hoc ' . $position,
                    'video_url' => null,
                    'updated_at' => now(),
                ];

                if (!$lesson) {
                    $values['course_id'] = $courseId;
                    $values['position'] = $position;
                    $values['created_at'] = now();

                    DB::table('lessons')->insert($values);
                } else {
                    DB::table('lessons')
                        ->where('id', $lesson->id)
                        ->update($values);
                }
            }
        }

        // 6. Tao 10 cau hoi mau cho moi khoa hoc
        $questionTemplates = [
            [
                'q' => 'Muc tieu chinh cua khoa hoc nay la gi?',
                'a' => 'Nam vung kien thuc va ky nang',
                'b' => 'Chi hoc thuoc ly thuyet',
                'c' => 'Khong can thuc hanh',
                'd' => 'Bo qua kien thuc co ban',
                'correct' => 'A',
            ],
            [
                'q' => 'Khi gap mot noi dung chua hieu, nen lam gi?',
                'a' => 'Bo qua noi dung',
                'b' => 'Tim hieu va hoi nguoi huong dan',
                'c' => 'Dung hoc ngay',
                'd' => 'Doan dap an',
                'correct' => 'B',
            ],
            [
                'q' => 'Cach nao giup ghi nho kien thuc tot hon?',
                'a' => 'Chi doc mot lan',
                'b' => 'Khong can on tap',
                'c' => 'On tap va thuc hanh thuong xuyen',
                'd' => 'Hoc khong theo ke hoach',
                'correct' => 'C',
            ],
            [
                'q' => 'Truoc khi thuc hien bai tap, nen lam gi?',
                'a' => 'Doc va phan tich yeu cau',
                'b' => 'Lam ngay khong can doc',
                'c' => 'Bo qua huong dan',
                'd' => 'Sao chep bai cua nguoi khac',
                'correct' => 'A',
            ],
            [
                'q' => 'Khi phat hien loi trong bai lam, nen lam gi?',
                'a' => 'Xoa bo toan bo du an',
                'b' => 'Bo qua loi',
                'c' => 'Dung thuc hanh',
                'd' => 'Kiem tra va tim nguyen nhan',
                'correct' => 'D',
            ],
            [
                'q' => 'Tai sao can thuc hanh sau khi hoc ly thuyet?',
                'a' => 'De tang thoi gian hoc',
                'b' => 'De ap dung kien thuc vao thuc te',
                'c' => 'De khong can on bai',
                'd' => 'De tranh lam bai tap',
                'correct' => 'B',
            ],
            [
                'q' => 'Viec lap ke hoach hoc tap co tac dung gi?',
                'a' => 'Lam viec hoc kho khan hon',
                'b' => 'Khong co tac dung',
                'c' => 'Giup theo doi tien do hoc tap',
                'd' => 'Thay the viec thuc hanh',
                'correct' => 'C',
            ],
            [
                'q' => 'Khi lam viec nhom, dieu gi la quan trong?',
                'a' => 'Trao doi va phoi hop',
                'b' => 'Lam viec rieng le',
                'c' => 'Khong chia se thong tin',
                'd' => 'Khong phan cong cong viec',
                'correct' => 'A',
            ],
            [
                'q' => 'Sau khi hoan thanh bai hoc, nen lam gi?',
                'a' => 'Xoa het noi dung',
                'b' => 'Khong can kiem tra',
                'c' => 'Dung hoc tap',
                'd' => 'On tap va tu danh gia',
                'correct' => 'D',
            ],
            [
                'q' => 'Yeu to nao giup cai thien ket qua hoc tap?',
                'a' => 'Hoc khong deu dan',
                'b' => 'Kien tri va thuc hanh',
                'c' => 'Khong dat muc tieu',
                'd' => 'Bo qua bai tap',
                'correct' => 'B',
            ],
        ];

        foreach ($courses as $courseId) {
            foreach ($questionTemplates as $index => $question) {
                $questionText = 'Cau ' . ($index + 1) . ': ' . $question['q'];

                $exists = DB::table('questions')
                    ->where('course_id', $courseId)
                    ->where('question_text', $questionText)
                    ->exists();

                if (!$exists) {
                    DB::table('questions')->insert([
                        'course_id' => $courseId,
                        'question_text' => $questionText,
                        'option_a' => $question['a'],
                        'option_b' => $question['b'],
                        'option_c' => $question['c'],
                        'option_d' => $question['d'],
                        'correct_option' => $question['correct'],
                        'points' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        // 7. Tao dang ky khoa hoc mau
        foreach ($students as $index => $student) {
            $courseIndexes = [
                $index % 8,
                ($index + 3) % 8,
            ];

            foreach (array_unique($courseIndexes) as $courseIndex) {
                $courseId = $courses[$courseIndex];

                DB::table('enrollments')->updateOrInsert(
                    [
                        'user_id' => $student->id,
                        'course_id' => $courseId,
                    ],
                    [
                        'enrolled_at' => now(),
                        'status' => 'active',
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }
        }

        // 8. Tao tien do hoc tap mau cho 5 hoc vien
        for ($i = 0; $i < 5; $i++) {
            $student = $students[$i];
            $courseId = $courses[$i % 8];

            $lessonId = DB::table('lessons')
                ->where('course_id', $courseId)
                ->where('position', 1)
                ->value('id');

            DB::table('lesson_progress')->updateOrInsert(
                [
                    'user_id' => $student->id,
                    'lesson_id' => $lessonId,
                ],
                [
                    'status' => 'completed',
                    'completed_at' => now(),
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }

        // 9. Tao mot vai luot lam bai kiem tra mau
        for ($i = 0; $i < 3; $i++) {
            $student = $students[$i];
            $courseId = $courses[$i];

            $exists = DB::table('quiz_attempts')
                ->where('user_id', $student->id)
                ->where('course_id', $courseId)
                ->exists();

            if (!$exists) {
                DB::table('quiz_attempts')->insert([
                    'user_id' => $student->id,
                    'course_id' => $courseId,
                    'started_at' => now()->subMinutes(20),
                    'submitted_at' => now(),
                    'score' => 8,
                    'answers' => json_encode([
                        '1' => 'A',
                        '2' => 'B',
                        '3' => 'C',
                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
