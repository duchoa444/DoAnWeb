<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlatform - Quản lý học tập</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background-color: #f8f9fa;">

<header style="display: flex; justify-content: space-between; align-items: center; padding: 15px 30px; background: #ffffff; border-bottom: 1px solid #e0e0e0; flex-wrap: wrap;">
    {{-- Logo giữ nguyên tên EduPlatform --}}
    <div class="logo">
        <a href="/courses" style="text-decoration: none; color: #007bff; font-size: 20px;">
            <strong>🎓 EduPlatform</strong>
        </a>
    </div>

    {{-- Menu điều hướng theo vai trò --}}
    <nav style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
        <a href="/courses" style="text-decoration: none; color: #333;">Khóa học</a>

        @auth
            {{-- Vai trò Học viên (student) --}}
            @if(auth()->user()->role === 'student')
                <a href="/my-courses" style="text-decoration: none; color: #333;">Khóa học của tôi</a>
                <a href="/exam-history" style="text-decoration: none; color: #333;">Lịch sử thi</a>
            @endif

            {{-- Vai trò Giảng viên (teacher) --}}
            @if(auth()->user()->role === 'teacher')
                <a href="/teacher/courses" style="text-decoration: none; color: #333;">Quản lý giảng dạy</a>
                <a href="/teacher/exams" style="text-decoration: none; color: #333;">Quản lý đề thi</a>
            @endif

            {{-- Vai trò Quản trị viên (admin) --}}
            @if(auth()->user()->role === 'admin')
                <a href="/admin/users" style="text-decoration: none; color: #333;">Quản lý tài khoản</a>
                <a href="/admin/approve-courses" style="text-decoration: none; color: #333;">Duyệt khóa học</a>
            @endif
        @endauth
    </nav>

    {{-- Khu vực Tài khoản / Đăng nhập --}}
    <div style="display: flex; gap: 10px; align-items: center;">
        @auth
            <span style="font-size: 14px; color: #555;">Xin chào, <strong>{{ auth()->user()->name }}</strong></span>
            <form action="/logout" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" style="padding: 6px 12px; background: #dc3545; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    Đăng xuất
                </button>
            </form>
        @else
            <a href="/login" style="padding: 7px 14px; border: 1px solid #007bff; color: #007bff; text-decoration: none; border-radius: 4px;">Đăng nhập</a>
            <a href="/register" style="padding: 7px 14px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">Đăng ký</a>
        @endauth
    </div>
</header>