# Đề cương đồ án – VHHHN

## 1. Thông tin chung

| Mục | Nội dung |
| --- | --- |
| Đề tài | Quản lý học tập |
| Tên sản phẩm | [Ví dụ: Website bán sách BookStore] |
| Lớp, nhóm | CD CNTT 24WebD – VHHHN |
| Repository | https://github.com/duchoa444/DoAnWeb.git (Private, đã mời GV) |
| Board Trello | https://trello.com/invite/b/6af11d2c137d9527eed20231/ATTI8fbcedc7c99e27acb414e1e73343168788B7DD0E/nhomvhhhnquan-ly-hoc-tap (đã mời GV) |
| Ngày lập | 11/09/2026 |

## 2. Thành viên và vai trò

| Mã | Họ tên | MSSV | Vai trò | Email | Phụ trách chính |
| --- | --- | --- | --- | --- | --- |
| TV1 | Nguyễn Hoàng Anh Vũ | 0306241254 | LE – Leader (trưởng nhóm) | 0306241254@caothang.edu.vn | Quản lý dự án, Trello, [mã chức năng] |
| TV2 | Phan Văn Hiếu | 0306241442 | BE 1 – Backend 1 | 0306241442@caothang.edu.vn | Xác thực, nghiệp vụ chính, [mã] |
| TV3 | Trần Thanh Hồ | 0306241279 | FE – Frontend | 0306241279@caothang.edu.vn | Giao diện người dùng, [mã] |
| TV4 | Phan Văn Hòa | 0306241444 | BE 2  – Backend 2 (CSDL) | 0306241444@caothang.edu.vn | ERD, migration, quản trị, [mã] |
| TV5 | Nguyễn Thành Nhân | 0306241315 | GT – Git & Tester | 0306241315@caothang.edu.vn| Quy tắc Git, review PR, kiểm thử, [mã] |

## 3. Công nghệ

| Thành phần | Lựa chọn | Lý do chọn |
| --- | --- | --- |
| Backend | Laravel |Năng lực nhóm đáp ứng tốt, hỗ trợ RESTful API mạnh mẽ, ORM Eloquent tối ưu truy vấn, tài liệu hướng dẫn dồi dào |
| Frontend |  ReactJS | Tối ưu trải nghiệm người dùng, linh hoạt tái sử dụng Component, tốc độ phản hồi nhanh, cộng đồng hỗ trợ lớn  |
| Cơ sở dữ liệu | SQL Server  | Độ tin cậy cao, quản lý dữ liệu có cấu trúc chặt chẽ, hỗ trợ transaction tốt, tương thích cao với tài liệu học tập và yêu cầu đồ án |
| Kiến trúc | Controller – Service – Repository | Tách nghiệp vụ, dễ viết unit test, dễ bảo trì và mở rộng code về sau |
| Công cụ | GitHub, Trello, Figma [VS Code], [AI: Gemini ] | Quản lý phiên bản code hiệu quả, theo dõi tiến độ nhóm trực quan, tối ưu tốc độ lập trình và brainstorm giải pháp rủi ro |

## 4. Phạm vi chức năng

Bắt buộc (Must) – mã theo đặc tả đề tài:

| Mã | Chức năng | Người phụ trách |
| --- | --- | --- |
| KH-01 | Trang chủ & Xem danh sách/chi tiết khóa học | TV1/TV2 |
| KH-02 | Đăng ký & Đăng nhập | TV1/TV2 |
| HV-03 | Đăng ký khóa học & Danh sách khóa học của tôi | TV1/TV2 |
| HV_04 | Giao diện xem bài học |  TV1/TV2 |
| HV_05 | Làm bài thi trắc nghiệm & Nộp bài|  TV1/TV2 |
| GV_06 | Quản lý khóa học & Nội dung bài học| TV1/TV2 |
| GV_07 | Quản lý ngân hàng câu hỏi & Tạo đề thi| TV1/TV2 |
| GV_08 | Xem danh sách học viên & Bảng điểm khóa học| TV1/TV2 |
| AD_09 | Quản lý người dùng (CRUD tài khoản, phân quyền)| TV1/TV2 |
| AD_10 | Duyệt/Ẩn khóa học của Giảng viên| TV1/TV2 |

Cộng điểm (Could), làm khi còn thời gian: HV-11: Đánh giá/Bình luận khóa học, AD-12: Thống kê báo cáo

Ngoài phạm vi (không làm): Thanh toán trực tuyến thực tế (MOMO/VNPay/Banking API), Tự động chấm điểm bài tập tự luận bằng AI, Ứng dụng di động (Mobile App)

## 5. Rủi ro và cách xử lý

| Rủi ro | Mức độ | Cách phòng tránh / xử lý |
| --- | --- | --- |
| Thành viên chưa quen công nghệ đã chọn | Cao | Pair-programming tuần 1, dùng mẫu khung dự án chung |
| Xung đột Git khi nhiều người sửa cùng tệp | Trung bình | Nhánh nhỏ theo chức năng, pull `develop` mỗi ngày |
| Trễ tiến độ chức năng nghiệp vụ chính | Cao | Ưu tiên làm sớm ở sprint S2, có người dự phòng |
| Rủi ro gian lận thời gian & lộ đáp án bài thi | Cao | Tính thời gian nộp bài tại Server, ẩn đáp án đúng ở Frontend |
## 6. Kế hoạch sprint

| Sprint | Thời gian | Mục tiêu |
| --- | --- | --- |
| S1 | Buổi 1 → Buổi 2 | Thiết kế (ERD, use case, wireframe), khung dự án, đăng ký/đăng nhập; tag `v0.1` |
| S2 – S3 | Buổi 2 → Buổi 4 | CRUD, tìm kiếm, nghiệp vụ chính; demo 70%; tag `v0.5` |
| S4 – S5 | Buổi 4 → Buổi 6 | Hoàn thiện, unit test, kiểm thử chéo, báo cáo; tag `v1.0` |

## 7. Duyệt đề cương

- Ý kiến giảng viên: [...]
- Kết quả: ☐ Duyệt  ☐ Duyệt có chỉnh sửa  ☐ Làm lại
