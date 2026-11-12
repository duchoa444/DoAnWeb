# Nhật ký sử dụng AI - TV5 (Nguyễn Thành Nhân)

## Mục AI-01 (Ngày 1 - Thứ 2, Tuần 1)
- **Thời gian:** 09/11/2026
- **Công cụ AI:** Gemini
- **Công việc**: Tạo file .gitignore và mẫu quy tắc Git cho nhóm.
- **Prompt đã dùng**: "Viết file .gitignore chuẩn cho dự án Web và giải thích ý nghĩa các folder bị bỏ qua."
- **Gợi ý AI giữ lại**: Giữ các dòng loại bỏ `node_modules/`, `.env`, thư mục `dist/` và `build/`.
- **Gợi ý AI loại bỏ**: Bỏ các dòng cấu hình dành riêng cho Eclipse và NetBeans.

## Mục AI-02 (Ngày 2 - Thứ 3, Tuần 1)
- **Thời gian:** 10/11/2026
- **Công cụ AI:** Gemini
- **Công việc**: Tạo 5 kịch bản kiểm thử (test cases) cho chức năng làm bài trắc nghiệm (`HT-06`) vào file `docs/test-cases.md`.
- **Prompt đã dùng**: "Tạo 5 test case cho chức năng làm bài trắc nghiệm trực tuyến (HT-06) bao gồm các trường hợp: làm bài bình thường, nộp bài trễ giờ, hết lượt làm bài và bỏ trống câu hỏi."
- **Gợi ý AI giữ lại**: Giữ lại 5 tình huống kiểm thử cốt lõi (nộp bài hợp lệ, bỏ trống câu hỏi, đồng hồ đếm ngược hết giờ tự nộp, chặn gửi request nộp bài trễ và vô hiệu hóa nút làm bài khi hết lượt).
- **Điểm tự chỉnh sửa cho khớp tiêu chí**:
  - Định dạng lại bảng theo đúng 6 cột quy định của đồ án: `ID`, `Mã chức năng`, `Bước`, `Dữ liệu`, `Kết quả mong đợi`, `Kết quả thực tế`.
  - Chỉnh lại tên trường thời gian làm bài thành `quiz_minutes` cho khớp với thiết kế bảng `courses` trong ERD của nhóm.
  - Sửa cột `Kết quả thực tế` từ trạng thái giả định của AI sang `Pending` do hiện tại đang ở giai đoạn thiết kế, chưa chạy kiểm thử trên code thực tế.
  - Bổ sung điều kiện tài khoản học viên đã ghi danh vào khóa học ở cột `Dữ liệu` và `Bước` thực hiện.

  ---

## AI-03: Sinh bộ Test Case cho HT-03 và Checklist bảo mật chức năng Đăng ký

- **Thời gian:** 11/11/2026
- **Công cụ AI:** Gemini
- **Nhiệm vụ liên quan:** Thêm test case `HT-03` và lập checklist kiểm tra bảo mật khi review chức năng đăng ký (`feature/HT-03-dang-ky`).
- **Prompt đã sử dụng:**
  > "Viết bộ test case chi tiết cho chức năng HT-03 (Đăng ký tài khoản học viên) theo cấu trúc bảng của dự án Laravel 12 và liệt kê các lỗi bảo mật thường gặp ở chức năng đăng ký để làm checklist review code."
- **Kết quả AI hỗ trợ:**
  - Đề xuất 5 kịch bản kiểm thử (`TC-06` đến `TC-10`) bao phủ các trường hợp: đăng ký hợp lệ, trùng email, mật khẩu ngắn/không khớp, bỏ trống/sai định dạng trường bắt buộc và giả mạo tham số quyền (`role=admin`).
  - Liệt kê 4 điểm kiểm tra bảo mật trọng tâm: chống leo thang đặc quyền (Mass Assignment), bắt buộc băm mật khẩu (`Hash::make` / `bcrypt`), kiểm tra token `@csrf` trên form và quy tắc validate dữ liệu đầu vào tiếng Việt.
- **Kiểm tra & Chỉnh sửa của thành viên:**
  - Đã đối chiếu tên route `/register`, các trường dữ liệu (`name`, `email`, `password`) và cấu trúc phân quyền `student` cho khớp với thiết kế ERD v2 và khung dự án Laravel 12 của nhóm trước khi cập nhật vào `docs/test-cases.md`.