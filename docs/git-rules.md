# Quy tắc Quản lý Mã nguồn Git & Pull Request (PR)

## 1. Quy định đặt tên nhánh (Branch)
- Tính năng (Feature): `feature/ten-tinh-nang`
- Tài liệu (Docs): `docs/ten-tai-lieu`
- Khởi tạo/Cấu hình (Chore): `chore/ten-cong-viec`

## 2. Quy định Commit Message
- `feat:` Thêm chức năng mới (VD: `feat: dang nhap va dang ky`)
- `docs:` Bổ sung hoặc chỉnh sửa tài liệu (VD: `docs: de cuong do an`)
- `fix:` Sửa lỗi mã nguồn
- `chore:` Cấu hình dự án, cài đặt thư viện

## 3. Quy trình Merge Pull Request
- Tất cả thành viên **KHÔNG** commit trực tiếp vào nhánh `main` hoặc `develop`.
- Mọi thay đổi phải push lên nhánh riêng và tạo Pull Request (PR) vào nhánh `develop`.
- TV5 (QA Lead) kiểm tra code và file AI Log trước khi duyệt Merge vào `develop`.