# AI LOG - TV2 (PHAN VĂN HIẾU) - BACKEND LEAD

## NGÀY 1: KHỞI TẠO DỰ ÁN & CẤU TRÚC BACKEND 3 LỚP
### 1. Câu prompt sử dụng
> "So sánh cách tổ chức thư mục 3 lớp cho dự án Laravel có 3 vai trò người dùng (Student, Teacher, Admin) – kiểm chứng với tài liệu chính thức."

### 2. Gợi ý từ AI 
- **Kiến trúc 3 lớp**:
  - `Controllers`: Tiếp nhận request, validate dữ liệu đầu vào và trả về response.
  - `Services`: Xử lý toàn bộ logic nghiệp vụ (business logic) của hệ thống.
  - `Repositories`: Đóng gói logic truy vấn cơ sở dữ liệu (Eloquent ORM).
- **Cấu hình môi trường**: Tạo tệp `.env.example` chứa các biến mẫu để đảm bảo an toàn thông tin.

### 3. Gợi ý sai / Loại bỏ
- AI gợi ý tạo thêm lớp `DTO (Data Transfer Object)` và `Events/Listeners` cho dự án nhỏ: **Loại bỏ** vì làm tăng độ phức tạp không cần thiết trong giai đoạn khởi tạo ban đầu.


## NGÀY 2: CẤU HÌNH KẾT NỐI CSDL & BASE CLASSES
### 1. Câu prompt sử dụng
> "Hỏi AI cách đọc biến môi trường an toàn trong Laravel và kiểm chứng file .env đã nằm trong .gitignore."

### 2. Gợi ý từ AI 
- **Đọc biến môi trường an toàn**:
  - Không gọi trực tiếp hàm `env()` ở các file Controller hay Service; chỉ gọi trong file cấu hình (`config/database.php`) và dùng hàm `config()` ở mã nguồn ứng dụng.
- **Bảo mật `.env`**:
  - Đã kiểm tra và xác nhận tệp `.env` nằm trong tệp `.gitignore` để tránh bị đẩy lộ thông tin CSDL lên GitHu[cite: 7].
- **Cấu hình kết nối**:
  - Khai báo chuẩn các thông số `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` cho MySQL.

### 3. Kết quả áp dụng
- Tạo lớp cơ sở `BaseRepository` và `BaseService` để chuẩn hóa các phương thức CRUD.
- Tạo `UserRole` Enum để quản lý 3 vai trò: `student`, `teacher`, `admin`.

## NGÀY 3: SƠ ĐỒ KIẾN TRÚC & ĐĂNG KÝ HỌC VIÊN (HT-03)

### 1. Câu prompt sử dụng
> "Kiểm tra thuật toán băm mật khẩu an toàn trong Laravel và xử lý chỉ định vai trò mặc định cho Học viên khi đăng ký."

### 2. Kết quả kiểm chứng
- Sử dụng `Hash::make()` (mặc định Bcrypt) để mã hóa mật khẩu trước khi lưu CSDL.
- Ép cố định `role` thành `student` trong `AuthService` để tránh lỗ hổng bảo mật người dùng tự gán quyền từ Client.