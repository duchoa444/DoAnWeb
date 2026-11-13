# MÔ TẢ CƠ SỞ DỮ LIỆU – HỆ THỐNG QUẢN LÝ HỌC TẬP

## 1. Tổng quan

Cơ sở dữ liệu của hệ thống Quản lý học tập được thiết kế nhằm quản lý người dùng, danh mục khóa học, bài học, đăng ký khóa học, tiến độ học tập và kết quả kiểm tra.

Cơ sở dữ liệu gồm 8 bảng chính:
1. users
2. categories
3. courses
4. lessons
5. enrollments
6. lesson_progress
7. questions
8. quiz_attempts

## 2. Mô tả chi tiết các bảng

### 2.1. Bảng users – Người dùng

**Chức năng:** Lưu thông tin tài khoản của người sử dụng hệ thống.

| Trường | Mô tả |
|---|---|
| id | Khóa chính, mã người dùng |
| name | Họ tên người dùng |
| email | Email đăng nhập, không trùng lặp |
| password | Mật khẩu đã mã hóa |
| role | Vai trò: admin, teacher, student |
| email_verified_at | Thời gian xác thực email |
| remember_token | Mã ghi nhớ đăng nhập |
| created_at | Thời gian tạo |
| updated_at | Thời gian cập nhật |

### 2.2. Bảng categories – Danh mục khóa học

**Chức năng:** Quản lý các danh mục dùng để phân loại khóa học.

| Trường | Mô tả |
|---|---|
| id | Khóa chính |
| name | Tên danh mục |
| description | Mô tả danh mục |
| created_at | Thời gian tạo |
| updated_at | Thời gian cập nhật |

### 2.3. Bảng courses – Khóa học

**Chức năng:** Lưu thông tin khóa học do giảng viên tạo.

| Trường | Mô tả |
|---|---|
| id | Khóa chính |
| category_id | Khóa ngoại tham chiếu categories |
| teacher_id | Khóa ngoại tham chiếu users |
| title | Tên khóa học |
| description | Mô tả khóa học |
| quiz_minutes | Thời gian làm bài kiểm tra |
| status | Trạng thái khóa học |
| created_at | Thời gian tạo |
| updated_at | Thời gian cập nhật |

### 2.4. Bảng lessons – Bài học

**Chức năng:** Lưu nội dung các bài học thuộc khóa học.

| Trường | Mô tả |
|---|---|
| id | Khóa chính |
| course_id | Khóa ngoại tham chiếu courses |
| title | Tiêu đề bài học |
| content | Nội dung bài học |
| video_url | Đường dẫn video |
| position | Thứ tự bài học |
| created_at | Thời gian tạo |
| updated_at | Thời gian cập nhật |

### 2.5. Bảng enrollments – Đăng ký khóa học

**Chức năng:** Lưu thông tin học viên đăng ký tham gia khóa học.

| Trường | Mô tả |
|---|---|
| id | Khóa chính |
| user_id | Khóa ngoại tham chiếu users |
| course_id | Khóa ngoại tham chiếu courses |
| enrolled_at | Thời gian đăng ký |
| status | Trạng thái đăng ký |
| created_at | Thời gian tạo |
| updated_at | Thời gian cập nhật |

**Ràng buộc:** Một học viên không được đăng ký trùng một khóa học. UNIQUE(user_id, course_id).

### 2.6. Bảng lesson_progress – Tiến độ bài học

**Chức năng:** Theo dõi tiến độ hoàn thành từng bài học của học viên.

| Trường | Mô tả |
|---|---|
| id | Khóa chính |
| user_id | Khóa ngoại tham chiếu users |
| lesson_id | Khóa ngoại tham chiếu lessons |
| status | Trạng thái học bài |
| completed_at | Thời gian hoàn thành |
| created_at | Thời gian tạo |
| updated_at | Thời gian cập nhật |

**Ràng buộc:** Mỗi học viên chỉ có một bản ghi tiến độ cho một bài học. UNIQUE(user_id, lesson_id).

### 2.7. Bảng questions – Câu hỏi trắc nghiệm

**Chức năng:** Lưu các câu hỏi và đáp án của từng khóa học.

| Trường | Mô tả |
|---|---|
| id | Khóa chính |
| course_id | Khóa ngoại tham chiếu courses |
| question_text | Nội dung câu hỏi |
| option_a | Đáp án A |
| option_b | Đáp án B |
| option_c | Đáp án C |
| option_d | Đáp án D |
| correct_option | Đáp án đúng |
| points | Điểm của câu hỏi |
| created_at | Thời gian tạo |
| updated_at | Thời gian cập nhật |

### 2.8. Bảng quiz_attempts – Lượt làm bài kiểm tra

**Chức năng:** Lưu lịch sử các lần làm bài kiểm tra của học viên.

| Trường | Mô tả |
|---|---|
| id | Khóa chính |
| user_id | Khóa ngoại tham chiếu users |
| course_id | Khóa ngoại tham chiếu courses |
| started_at | Thời gian bắt đầu |
| submitted_at | Thời gian nộp bài |
| score | Điểm đạt được |
| answers | Câu trả lời được lưu dưới dạng JSON |
| created_at | Thời gian tạo |
| updated_at | Thời gian cập nhật |

## 3. Các mối quan hệ giữa các bảng

- Một danh mục có thể chứa nhiều khóa học.
- Một giảng viên có thể tạo nhiều khóa học.
- Một khóa học có nhiều bài học.
- Một học viên có thể đăng ký nhiều khóa học.
- Một khóa học có thể có nhiều học viên đăng ký.
- Một học viên có thể có tiến độ học tập ở nhiều bài học.
- Một bài học có thể có tiến độ của nhiều học viên.
- Một khóa học có nhiều câu hỏi trắc nghiệm.
- Một học viên có thể thực hiện nhiều lượt làm bài kiểm tra.
- Một khóa học có thể có nhiều lượt làm bài kiểm tra.

## 4. Các ràng buộc dữ liệu quan trọng

1. Email người dùng không được trùng lặp.
2. Các khóa ngoại đảm bảo dữ liệu liên kết giữa các bảng.
3. Không cho phép một học viên đăng ký trùng một khóa học.
4. Không cho phép một học viên có nhiều bản ghi tiến độ cho cùng một bài học.
5. Các khóa ngoại được thiết lập xóa dây chuyền theo Migration.

## 5. Hình ảnh ERD cuối cùng

Sơ đồ ERD cuối cùng được lưu tại:

`docs/databases/erd-final.png`

Sơ đồ thể hiện 8 bảng, khóa chính, khóa ngoại và các mối quan hệ giữa các bảng trong hệ thống.
