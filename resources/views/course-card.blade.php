<div style="border: 1px solid #ddd; width: 250px; border-radius: 8px; padding: 12px; margin: 10px; background: #fff;">
    <!-- 1. Ảnh bìa -->
    <img src="https://via.placeholder.com/250x150" alt="Ảnh bìa" style="width: 100%; border-radius: 4px;">
    <!-- 2. Tên khóa học -->
    <h3 style="font-size: 1.1rem; margin: 10px 0 5px;">{{ $course->title }}</h3>
    <!-- 3. Tên giảng viên -->
    <p style="color: #666; font-size: 0.9rem; margin: 0 0 8px;">GV: {{ $course->teacher?->name ?? 'Chưa cập nhật' }}</p>
    <!-- 4. Số bài học -->
    <span style="background: #e9ecef; padding: 3px 8px; border-radius: 4px; font-size: 0.85rem;">📚 {{ $course->lessons_count }} bài học</span>
</div>