# BÁO CÁO MỐC 1 – THIẾT KẾ & KHUNG DỰ ÁN
**Đề tài:** E. Quản lý học tập (Nền tảng khóa học trực tuyến miễn phí)  
**Nhóm thực hiện:** Nhóm 5 thành viên (TV1 – TV5)  
**Trưởng nhóm (PM/Scrum Master):** Nguyễn Hoàng Anh Vũ (TV1)

---

## 1. Giới thiệu đề tài
Hệ thống **Quản lý học tập trực tuyến** hỗ trợ vận hành các khóa học miễn phí với hai luồng nghiệp vụ trọng tâm:
* **Giảng viên:** Tạo và quản lý khóa học, đăng tải bài học theo thứ tự và thiết lập bài kiểm tra trắc nghiệm có giới hạn thời gian.
* **Học viên:** Tìm kiếm, ghi danh khóa học, theo dõi tiến độ từng bài học và làm bài trắc nghiệm được hệ thống chấm điểm tự động.

---

## 2. Công nghệ sử dụng
* **Frontend:** React JS
* **Backend:** PHP Laravel
* **Cơ sở dữ liệu:** QL Server
* **Quản lý mã nguồn & Công việc:** Git/GitHub (mô hình nhánh `develop`, `feature/*`, `docs/*`) và Trello (Agile/Scrum).

---

## 3. Kiến trúc hệ thống & Phân quyền
* **Kiến trúc phần mềm:** Mô hình phân tầng `Controller -> Service -> Repository -> Database`, tách biệt rõ xử lý HTTP Request, nghiệp vụ (Business Logic) và truy vấn dữ liệu. Cấu hình bảo mật thông qua biến môi trường (`.env` / `appsettings.Development.json`, đã đưa vào `.gitignore`).
* **Kiến trúc 4 tác nhân & Phân quyền (RBAC):**
  * **Khách vãng lai (Guest):** Xem danh sách, tìm kiếm khóa học, đăng ký/đăng nhập.
  * **Học viên (`student`):** Ghi danh khóa học, học bài, lưu tiến độ và làm bài trắc nghiệm.
  * **Giảng viên (`teacher`):** Quản lý khóa học cá nhân (Nháp/Công khai/Ẩn), quản lý bài học và ngân hàng câu hỏi trắc nghiệm.
  * **Quản trị viên (`admin`):** Quản lý người dùng, danh mục khóa học và giám sát hệ thống.

---

## 4. Thiết kế Cơ sở dữ liệu (ERD v2 – Chuẩn 3NF)
Sơ đồ chi tiết lưu tại: `docs/database/erd-v2.png` (kèm mô tả tại `docs/database/mo-ta-bang.md`).
* **Các bảng chính:** `users`, `categories`, `courses`, `lessons`, `enrollments`, `lesson_progress`, `questions`, `quiz_attempts`.
* **Ràng buộc toàn vẹn (Constraints):**
  * `enrollments`: Ràng buộc duy nhất `UNIQUE(user_id, course_id)` chống ghi danh trùng lặp.
  * `lesson_progress`: Ràng buộc duy nhất `UNIQUE(user_id, lesson_id)` đảm bảo tính chính xác tiến độ học.
  * `courses`: Quản lý trạng thái hiển thị (`draft` / `public` / `hidden`) và thời lượng làm bài (`quiz_minutes`).
  * `lessons`: Cột `position` quản lý thứ tự bài học.
* **Chỉ mục tối ưu truy vấn (Indexes):** `courses(category_id)`, `courses(teacher_id)`, `lessons(course_id, position)`, `quiz_attempts(user_id, course_id)`.

---

## 5. User Story & Phân công chức năng
| Thành viên | Mã chức năng | User Story trọng tâm |
| :--- | :--- | :--- |
| **TV1** (Trưởng nhóm) | **HT-07, HT-14, HT-15** | • Là **Học viên**, tôi muốn ghi danh vào khóa học miễn phí để bắt đầu học (HT-07).<br>• Là **Giảng viên**, tôi muốn thêm/sửa/xóa và sắp xếp thứ tự bài học trong khóa học của mình (HT-14).<br>• Là **Giảng viên/Học viên**, tôi muốn quản lý và thực hiện bài trắc nghiệm có đếm ngược thời gian, chấm điểm tự động (HT-15). |
| **TV2** (Backend Lead) | **HT-03, HT-06** | • Là **Người dùng**, tôi muốn đăng ký/đăng nhập và phân quyền đúng vai trò hệ thống (HT-03).<br>• Là **Học viên**, tôi muốn nộp bài trắc nghiệm và nhận kết quả chấm tự động chính xác theo thời gian thực (HT-06). |
| **TV3** (Frontend Lead) | **HT-01, HT-02, HT-05** | • Là **Khách vãng lai**, tôi muốn xem trang chủ, tìm kiếm và lọc danh sách khóa học (HT-01, HT-02).<br>• Là **Học viên**, tôi muốn giao diện học bài trực quan và theo dõi tiến độ hoàn thành từng bài (HT-05). |
| **TV4** (Database) | **HT-09, HT-10** | • Là **Giảng viên**, tôi muốn tạo mới và cập nhật thông tin khóa học, chuyển trạng thái nháp/công khai (HT-09, HT-10). |
| **TV5** (QA & Git) | **HT-04, HT-11** | • Là **Quản trị viên**, tôi muốn quản lý danh mục khóa học và kiểm duyệt người dùng/khóa học (HT-04, HT-11). |

---

## 6. Kế hoạch Sprint 2 (S2)
* **Mục tiêu S2:** Hoàn thiện toàn bộ tính năng CRUD cốt lõi, luồng học tập và làm bài trắc nghiệm End-to-End.
* **Hạng mục triển khai chính:**
  1. **Backend (TV2, TV4):** Hoàn thiện API xác thực JWT/Session, API quản lý khóa học/bài học, API `QuizController` (`start` ẩn đáp án & `submit` kiểm tra giờ, chấm điểm).
  2. **Frontend (TV3, TV1):** Ghép API vào giao diện trang danh sách khóa học, trang chi tiết khóa học, màn hình học bài và màn hình làm bài trắc nghiệm (có đồng hồ đếm ngược).
  3. **Kiểm thử & Tài liệu (TV5):** Thực thi bộ Test Case cho các luồng chính và luồng ngoại lệ (hết giờ, hết lượt làm bài, ghi danh trùng), cập nhật nhật ký AI.