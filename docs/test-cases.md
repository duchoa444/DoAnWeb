# Danh sách Kịch bản Kiểm thử (Test Cases)

## 1. Quy ước chung
- **Trạng thái**: Pass / Fail / Pending
- **Môi trường kiểm thử**: Localhost (Chrome / Edge)

## 2. Bảng Test Cases Mẫu (Chức năng HT-06: Làm bài trắc nghiệm)

| ID | Mã chức năng | Bước | Dữ liệu | Kết quả mong đợi | Kết quả thực tế |
| :--- | :--- | :--- | :--- | :--- | :--- |
| TC-01 | HT-06 | 1. Đăng nhập tài khoản Học viên.<br>2. Vào khóa học đã ghi danh và bấm "Làm bài trắc nghiệm".<br>3. Chọn đủ đáp án và bấm "Nộp bài" trước khi hết giờ. | Tài khoản: `hv1@test.com`<br>Đáp án đúng: 8/10 câu | Hệ thống lưu lượt làm bài, chấm điểm tự động (8/10) và hiển thị kết quả ngay lập tức. | Pending |
| TC-02 | HT-06 | 1. Bắt đầu làm bài trắc nghiệm.<br>2. Không chọn đáp án cho 3 câu hỏi.<br>3. Bấm "Nộp bài". | Bỏ trống câu 2, 5, 9.<br>Các câu còn lại đúng hết. | Hệ thống hiển thị cảnh báo xác nhận nộp bài khi còn câu trống; nếu xác nhận, các câu trống tính 0 điểm (tổng 7/10). | Pending |
| TC-03 | HT-06 | 1. Bắt đầu làm bài (thời gian `quiz_minutes` = 15 phút).<br>2. Để đồng hồ đếm ngược về `00:00` mà chưa bấm nộp. | Thời gian làm bài hết hạn | Hệ thống tự động khóa chọn đáp án và tự động nộp bài với các đáp án đã chọn trước đó. | Pending |
| TC-04 | HT-06 | 1. Bắt đầu làm bài.<br>2. Can thiệp API hoặc gửi request nộp bài sau khi thời gian làm bài đã kết thúc quá thời gian cho phép. | Request nộp bài trễ hơn thời điểm bắt đầu + `quiz_minutes` | Backend từ chối ghi nhận điểm mới hoặc đánh dấu bài nộp trễ không hợp lệ theo quy định. | Pending |
| TC-05 | HT-06 | 1. Học viên đã làm hết số lượt tối đa cho phép của bài kiểm tra.<br>2. Truy cập lại trang bài trắc nghiệm và bấm "Làm lại". | Tài khoản đã hết lượt làm bài | Nút "Làm bài" bị vô hiệu hóa (disabled) và hiển thị thông báo "Bạn đã hết lượt làm bài". | Pending |

## 3. Bảng Test Cases (Chức năng HT-03: Đăng ký tài khoản học viên)

| ID | Mã chức năng | Bước | Dữ liệu | Kết quả mong đợi | Kết quả thực tế |
| :--- | :--- | :--- | :--- | :--- | :--- |
| TC-06 | HT-03 | 1. Truy cập trang `/register`.<br>2. Nhập đầy đủ họ tên, email chưa tồn tại, mật khẩu hợp lệ và xác nhận mật khẩu.<br>3. Bấm "Đăng ký". | Tên: `Nguyễn Văn A`<br>Email: `sv_moi@example.com`<br>Pass: `12345678` | Tạo tài khoản thành công với vai trò mặc định là `student`, mật khẩu được băm (hash) trong CSDL và chuyển hướng đăng nhập thành công. | Pending |
| TC-07 | HT-03 | 1. Truy cập trang `/register`.<br>2. Nhập email đã tồn tại trong hệ thống.<br>3. Bấm "Đăng ký". | Email: `teacher01@example.com`<br>Pass: `12345678` | Hệ thống từ chối tạo tài khoản và hiển thị thông báo lỗi bằng tiếng Việt (VD: "Email đã được sử dụng"). | Pending |
| TC-08 | HT-03 | 1. Truy cập trang `/register`.<br>2. Nhập mật khẩu ngắn hơn quy định (dưới 8 ký tự) hoặc mật khẩu xác nhận không khớp.<br>3. Bấm "Đăng ký". | Email: `sv2@example.com`<br>Pass: `123` | Form báo lỗi validate bằng tiếng Việt, không lưu dữ liệu vào CSDL. | Pending |
| TC-09 | HT-03 | 1. Truy cập trang `/register`.<br>2. Bỏ trống các trường bắt buộc hoặc nhập sai định dạng email.<br>3. Bấm "Đăng ký". | Email: `khongphaiemail`<br>Tên: *(trống)* | Hệ thống chặn submit và hiển thị thông báo lỗi tiếng Việt tương ứng từng trường. | Pending |
| TC-10 | HT-03 | 1. Gửi request POST tới route đăng ký kèm tham số giả mạo quyền quản trị (`role=admin` hoặc `role=teacher`). | Payload chứa `role: "admin"` | Backend bỏ qua tham số `role` gửi lên, chỉ tạo tài khoản với vai trò `student`. | Pending |