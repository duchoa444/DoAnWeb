# Cấu trúc thư mục dự án

```text
DoAnWeb_QuanLyHocTap/
├── ai-logs/                  # Nhật ký sử dụng AI của 5 thành viên (≥ 2 mục/người)
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Xử lý request (AuthController, CourseController, QuizController...)
│   │   └── Middleware/       # Phân quyền 3 vai trò (Admin, Teacher, Student)
│   ├── Models/               # Các Eloquent Model ánh xạ 8 bảng CSDL
│   └── Services/             # Nghiệp vụ tách lớp (AuthService...)
├── database/
│   ├── migrations/           # 8 file migration định nghĩa cấu trúc bảng và ràng buộc
│   └── seeders/              # Dữ liệu mẫu (danh mục, người dùng 3 vai trò, khóa học, câu hỏi)
├── docs/
│   ├── databases/            # Sơ đồ ERD (erd-final.png) và mô tả chi tiết các bảng
│   ├── meetings/             # Biên bản họp nhóm (Biên bản 01, 02)
│   ├── wireframe/            # Thiết kế giao diện các màn hình chính
│   ├── architecture.png      # Sơ đồ kiến trúc hệ thống và luồng route 3 vai trò
│   ├── cau-truc-thu-muc.md   # Tài liệu mô tả cấu trúc thư mục dự án
│   ├── de-cuong.md           # Đề cương dự án
│   ├── git-rules.md          # Quy ước nhánh Git, commit và quy trình review PR
│   ├── moc-1.md              # Tài liệu tổng hợp báo cáo Mốc 1
│   └── test-cases.md         # Bộ kịch bản kiểm thử chức năng (HT-03, HT-06...)
├── resources/
│   └── views/                # Giao diện Blade (layouts, auth, courses, admin, teacher)
├── routes/
│   └── web.php               # Định tuyến các khu vực Public, Student, Teacher, Admin
├── .env.example              # Mẫu cấu hình biến môi trường
└── README.md                 # Hướng dẫn cài đặt, migration + seed và tài khoản demo