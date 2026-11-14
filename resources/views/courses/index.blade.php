{{-- Gọi Header từ file header.blade.php --}}
@include('header')

<div style="padding: 20px; max-width: 1200px; margin: 0 auto;">
    <h2 style="margin-bottom: 20px;">Danh sách khóa học</h2>

    @if (session('success'))
        <div role="status" style="padding: 12px; margin-bottom: 20px; background: #e8f5e9; color: #2e7d32; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @forelse($courses as $course)
            <div style="flex: 1 1 calc(33.333% - 20px); min-width: 280px;">
                @include('course-card', ['course' => $course])
            </div>
        @empty
            <p>Hiện chưa có khóa học nào được xuất bản.</p>
        @endforelse
    </div>

    <div style="margin-top: 20px;">
        {{ $courses->links() }}
    </div>
</div>

{{-- Gọi Footer từ file footer.blade.php --}}
@include('footer')