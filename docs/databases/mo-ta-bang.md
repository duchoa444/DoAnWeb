# MÔ TẢ CƠ SỞ DỮ LIỆU – QUẢN LÝ HỌC TẬP

## 1. users
Lưu thông tin người dùng trong hệ thống.
- `id`: Mã người dùng (PK).
- `full_name`: Họ tên.
- `email`: Email đăng nhập.
- `password`: Mật khẩu.
- `role`: Vai trò người dùng.
- `created_at`: Ngày tạo tài khoản.

## 2. categories
Lưu danh mục khóa học.
- `id`: Mã danh mục (PK).
- `name`: Tên danh mục.
- `description`: Mô tả danh mục.

## 3. courses
Lưu thông tin khóa học.
- `id`: Mã khóa học (PK).
- `category_id`: Mã danh mục (FK).
- `teacher_id`: Mã giảng viên (FK).
- `title`: Tên khóa học.
- `description`: Mô tả khóa học.
- `quiz_minutes`: Thời gian làm bài kiểm tra.
- `status`: Trạng thái khóa học.
- `created_at`: Ngày tạo.

## 4. lessons
Lưu các bài học thuộc khóa học.
- `id`: Mã bài học (PK).
- `course_id`: Mã khóa học (FK).
- `title`: Tên bài học.
- `content`: Nội dung bài học.
- `video_url`: Đường dẫn video.
- `position`: Thứ tự bài học.

## 5. enrollments
Lưu thông tin học viên đăng ký khóa học.
- `id`: Mã đăng ký (PK).
- `user_id`: Mã học viên (FK).
- `course_id`: Mã khóa học (FK).
- `enrolled_at`: Ngày đăng ký.
- `status`: Trạng thái đăng ký.

Ràng buộc UNIQUE (`user_id`, `course_id`) để tránh đăng ký trùng.

## 6. lesson_progress
Lưu tiến độ học tập của học viên.
- `id`: Mã tiến độ (PK).
- `user_id`: Mã học viên (FK).
- `lesson_id`: Mã bài học (FK).
- `status`: Trạng thái hoàn thành.
- `completed_at`: Thời gian hoàn thành.

Ràng buộc UNIQUE (`user_id`, `lesson_id`).

## 7. questions
Lưu các câu hỏi trắc nghiệm của khóa học.
- `id`: Mã câu hỏi (PK).
- `course_id`: Mã khóa học (FK).
- `question_text`: Nội dung câu hỏi.
- `option_a`, `option_b`, `option_c`, `option_d`: Các lựa chọn.
- `correct_option`: Đáp án đúng.
- `points`: Điểm câu hỏi.

## 8. quiz_attempts
Lưu lịch sử làm bài kiểm tra.
- `id`: Mã lượt làm bài (PK).
- `user_id`: Mã học viên (FK).
- `course_id`: Mã khóa học (FK).
- `started_at`: Thời gian bắt đầu.
- `submitted_at`: Thời gian nộp bài.
- `score`: Điểm đạt được.
- `answers`: Các câu trả lời của học viên.

## 9. Chỉ mục
- `courses(category_id)`
- `courses(teacher_id)`
- `lessons(course_id, position)`
- `quiz_attempts(user_id, course_id)`