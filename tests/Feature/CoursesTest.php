<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    use RefreshDatabase;

    public function test_successful_login_redirects_to_courses(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('correct-password'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'correct-password',
        ])
            ->assertRedirect(route('courses.index'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_courses_page_shows_public_courses_from_the_database_and_their_details(): void
    {
        $category = Category::create(['name' => 'Lập trình']);
        $teacher = User::factory()->create(['name' => 'Nguyễn An']);

        $course = Course::create([
            'category_id' => $category->id,
            'teacher_id' => $teacher->id,
            'title' => 'Laravel nhập môn',
            'description' => 'Khóa học thử nghiệm từ database.',
            'status' => 'published',
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => 'Bài đầu tiên',
            'position' => 1,
        ]);

        Course::create([
            'category_id' => $category->id,
            'teacher_id' => $teacher->id,
            'title' => 'Khóa học bản nháp',
            'status' => 'draft',
        ]);

        Course::create([
            'category_id' => $category->id,
            'teacher_id' => $teacher->id,
            'title' => 'Khóa học trạng thái public',
            'status' => 'public',
        ]);

        $this->get('/courses')
            ->assertOk()
            ->assertSee('Laravel nhập môn')
            ->assertSee('Khóa học trạng thái public')
            ->assertSee('Nguyễn An')
            ->assertSee('1 bài học')
            ->assertDontSee('Khóa học bản nháp');
    }
}
