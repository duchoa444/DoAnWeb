{{-- Gọi Header từ file header.blade.php --}}
@include('header')

<div style="padding: 20px; max-width: 1200px; margin: 0 auto;">
    <h2 style="margin-bottom: 20px;">Danh sách khóa học</h2>

    {{-- Lưới hiển thị danh sách khóa học --}}
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @php
            // Mảng dữ liệu giả (Fake Data) cho Ngày 3
            $courses = [
                ['title' => 'Lập trình Python cơ bản', 'author' => 'Nguyễn Minh', 'lessons' => 6, 'price' => 'Miễn phí'],
                ['title' => 'Thiết kế giao diện UI/UX', 'author' => 'Trần Hà', 'lessons' => 8, 'price' => '299.000 đ'],
                ['title' => 'Excel cho người mới bắt đầu', 'author' => 'Lê Mai', 'lessons' => 10, 'price' => '199.000 đ'],
                ['title' => 'Lập trình Web với Laravel', 'author' => 'Phạm Đức', 'lessons' => 12, 'price' => '499.000 đ'],
                ['title' => 'Tiếng Anh giao tiếp cơ bản', 'author' => 'Hoàng Anh', 'lessons' => 15, 'price' => 'Miễn phí'],
                ['title' => 'Phân tích dữ liệu Data Science', 'author' => 'Vũ Nam', 'lessons' => 9, 'price' => '599.000 đ'],
            ];
        @endphp

        {{-- Lặp qua các khóa học và gọi component course-card --}}
        @foreach($courses as $course)
            <div style="flex: 1 1 calc(33.333% - 20px); min-width: 280px;">
                @include('course-card', ['course' => $course])
            </div>
        @endforeach
    </div>
</div>

{{-- Gọi Footer từ file footer.blade.php --}}
@include('footer')