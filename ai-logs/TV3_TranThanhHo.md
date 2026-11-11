# NHẬT KÝ SỬ DỤNG AI - TRẦN THÀNH HỒ (TV3 - FRONTEND)

---

## AI-01: Gợi ý bố cục Wireframe giao diện học bài
- **Thời gian:** 09/11/2026
- **Công cụ AI:** Gemini
- **Prompt:**
- **Kết quả AI phản hồi & Đánh giá:**
  - **Gợi ý giữ lại:** Bố cục dạng 2 cột (Sidebar danh sách bài tập trung dạng accordion + Main content xem video), dùng sidebar ẩn/hiện trên giao diện Mobile.
  - **Gợi ý loại bỏ:** AI gợi ý thêm khung chat trực tiếp giữa các học viên ngay dưới video (không dùng vì làm rối màn hình học).
- **Bài học rút ra:** Dùng AI phác thảo nhanh ý tưởng Layout giúp tiết kiệm 50% thời gian vẽ Wireframe trên Figma.

## ## AI-02: Tạo Layout chung (Header/Footer) & Component Thẻ khóa học
**Thời gian:** 10/11/2026
**Công cụ AI:** Gemini
**Prompt:**
> "Viết giúp tôi file Blade HTML/CSS giao diện Header, Footer đơn giản và 1 component course-card.blade.php hiển thị thông tin khóa học sử dụng inline CSS responsive."
**Kết quả AI phản hồi & Đánh giá:**
- **Gợi ý giữ lại:** Bố cục flexbox responsive đơn giản, hiển thị đẹp trên cả Mobile 360px và Desktop 1366px.
- **Gợi ý loại bỏ:** Bỏ bớt các inline style dư thừa để code gọn nhẹ.
- **Bài học rút ra:** Dùng AI tạo khung code layout nhanh, sau đó tự điều chỉnh padding/margin cho khớp với dự án.

## ## AI-03: Trang danh sách khóa học tĩnh (HT-01)
**Thời gian:** 11/11/2026
**Công cụ AI:** Gemini
**Prompt:**
> "Viết giúp tôi file resources/views/courses/index.blade.php sử dụng vòng lặp @foreach lặp qua mảng dữ liệu giả 6 khóa học để render component course-card, kèm theo xử lý lỗi vendor autoload và migrate CSDL SQLite."
**Kết quả AI phản hồi & Đánh giá:**
- **Gợi ý giữ lại:** Cấu hình mảng dữ liệu giả $courses chuẩn xác, các bước khắc phục lỗi php.ini extension=zip và composer install rất trực quan.
- **Gợi ý loại bỏ:** Không dùng database thật ở Mốc 1 mà dùng mảng dữ liệu giả theo đúng yêu cầu đề bài.
- **Bài học rút ra:** Nắm rõ quy trình khắc phục lỗi môi trường Laravel khi khởi chạy trên máy mới.