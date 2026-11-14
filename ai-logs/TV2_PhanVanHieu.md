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

---

## NGÀY 4: ĐĂNG NHẬP, CHẶN TÀI KHOẢN KHÓA & PHÂN QUYỀN 3 VAI TRÒ (HT-03)

### 1. Câu prompt sử dụng
> "Xây dựng RoleMiddleware trong Laravel và logic điều hướng sau đăng nhập theo 3 vai trò (admin, teacher, student), đồng thời kiểm tra chặn tài khoản bị khóa."

### 2. Kết quả kiểm chứng
- Đã kiểm thử bằng cách đăng nhập tài khoản Học viên (`student`) và truy cập đường dẫn `/teacher/dashboard` -> Hệ thống chặn thành công và trả về lỗi `403 Forbidden`.
- Đăng nhập tài khoản Giảng viên (`teacher`) và truy cập `/admin/dashboard` -> Hệ thống chặn thành công (`403 Forbidden`).
- Đăng nhập tài khoản bị đánh dấu khóa (`is_active = false` / `status = locked`) -> `AuthService::login()` từ chối đăng nhập và trả thông báo lỗi rõ ràng.

---

## Ngày 5 – Thứ 6, tuần 1 (13/11/2026) — Mốc 1: Bảo vệ thiết kế & Hoàn thiện `[HT-03]`

### 1. Thông tin chung
* **Thành viên thực hiện:** TV2 – Phan Văn Hiếu (Backend Lead)
* **Chức năng / Nhiệm vụ:** `[HT-03]` Hoàn thiện đăng nhập, phân quyền 3 vai trò (`admin`, `teacher`, `student`) và tích hợp với giao diện Frontend.
* **Nhánh Git:** `fix/HT-03-phan-quyen`[cite: 3]

### 2. Nhật ký tương tác & Hỗ trợ từ AI
* **Prompt 1 (Xử lý lỗi Git & môi trường trên máy phòng thực hành):**
  * *Nội dung hỏi:* Khắc phục lỗi `not a git repository`, `RPC failed` khi clone dự án và lỗi `Permission denied` khi chạy `composer install` trong thư mục `Downloads` trên máy phòng thực hành.
  * *Kết quả AI hỗ trợ:* Hướng dẫn tăng `http.postBuffer`, dùng `git clone --depth 1` tải trực tiếp nhánh `develop` ra ổ `D:\` để tránh khóa quyền ghi, và sử dụng `composer install --no-dev --prefer-source` để cài đặt thư viện Laravel ổn định.
  * *Kiểm chứng & Áp dụng:* Đã clone thành công nhánh `develop` về ổ `D:\`, cài đặt đầy đủ thư viện `vendor`, cấu hình file `.env` kết nối MySQL và khởi chạy thành công `php artisan serve`.

* **Prompt 2 (Nối giao diện đăng nhập Frontend với Backend & kiểm thử `[HT-03]`):**
  * *Nội dung hỏi:* Kiểm tra nguyên nhân giao diện đăng nhập FE sau khi bấm nút chưa chuyển hướng vào trang Dashboard theo vai trò và cách rà soát toàn bộ luồng phân quyền trước khi đẩy lên GitHub.
  * *Kết quả AI hỗ trợ:* Xác định cần đồng bộ code Backend (`AuthController`, `AuthService`, `UserRepository`, `RoleMiddleware`) với view đăng nhập của FE, gắn đúng `method="POST"` và `action="{{ route('login') }}"` kèm `@csrf`, và kiểm thử 4 kịch bản phân quyền.
  * *Kiểm chứng & Áp dụng:* Đã kiểm tra thực tế trên trình duyệt:
    * Đăng ký mới tự động băm mật khẩu (`Hash::make`) và gán mặc định vai trò `student`.
    * Đăng nhập điều hướng chính xác theo vai trò (`/admin/dashboard`, `/teacher/dashboard`, `/student/dashboard`).
    * Tài khoản `student` truy cập trái phép route của `admin`/`teacher` bị `RoleMiddleware` chặn với mã lỗi `403 Forbidden`.

### 3. Kết quả cuối ngày
* Hoàn tất kiểm thử chức năng `[HT-03]`, đẩy code lên nhánh `fix/HT-03-phan-quyen` và tạo Pull Request để TV5 merge vào `develop` trước khi gắn tag `v0.1` chốt Mốc 1[cite: 3, 4].
* Cập nhật trạng thái thẻ Trello `[HT-03]` sang **Hoàn thành**[cite: 3].