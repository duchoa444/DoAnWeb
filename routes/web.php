
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Course;

Route::get('/', function () {
    return view('welcome');
});

// Hiển thị trang đăng ký
Route::get('/register', function () {
    return view('auth.register');
});

// Xử lý đăng ký
Route::post('/register', [AuthController::class, 'register']);

// Hiển thị trang đăng nhập
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Xử lý đăng nhập
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/student/dashboard', function () {
        return 'Xin chào! Đây là trang học viên.';
    });

});

Route::middleware(['auth', 'role:teacher'])->group(function () {

    Route::get('/teacher/dashboard', function () {
        return 'Xin chào! Đây là trang giảng viên.';
    });

});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return 'Xin chào! Đây là trang quản trị viên.';
    });

});
Route::get('/courses', function () {
    // Lấy danh sách khóa học công khai (published) từ CSDL
    $courses = Course::with('teacher')
        ->withCount('lessons')
        ->where('status', 'published')
        ->get()
        ->map(function ($course) {
            return [
                'id' => $course->id,
                'title' => $course->title,
                'author' => $course->teacher->name ?? 'Giảng viên',
                'lessons' => $course->lessons_count,
                'image' => $course->thumbnail ?? null,
            ];
        });

    return view('courses.index', compact('courses'));
});
    