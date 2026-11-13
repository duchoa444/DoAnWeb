<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Exception;

class EnrollmentService
{
    /**
     * Học viên ghi danh vào khóa học công khai
     */
    public function enroll(User $student, Course $course): Enrollment
    {
        if ($course->status !== 'published') {
            throw new Exception('Khóa học chưa được xuất bản.');
        }

        $exists = Enrollment::where('user_id', $student->id)
            ->where('course_id', $course->id)
            ->exists();

        if ($exists) {
            throw new Exception('Bạn đã ghi danh khóa học này rồi.');
        }

        return Enrollment::create([
            'user_id' => $student->id,
            'course_id' => $course->id,
            'enrolled_at' => now(),
        ]);
    }
}