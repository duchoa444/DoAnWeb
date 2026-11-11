# Hướng dẫn cài đặt và chạy dự án

## 1. Cài đặt môi trường

Yêu cầu:
- PHP 8.3 trở lên
- Composer
- Laravel 12
- SQLite

## 2. Cài đặt thư viện

Mở Terminal tại thư mục dự án và chạy:

```bash
composer install
```

## 3. Cấu hình môi trường

Tạo file `.env` từ `.env.example`:

```bash
copy .env.example .env
```

Tạo APP_KEY:

```bash
php artisan key:generate
```

Tạo file cơ sở dữ liệu SQLite nếu chưa có:

```bash
type nul > database\database.sqlite
```

Trong file `.env`, cấu hình:

```env
DB_CONNECTION=sqlite
```

## 4. Chạy Migration

Tạo các bảng trong cơ sở dữ liệu:

```bash
php artisan migrate
```

## 5. Tạo dữ liệu mẫu

Chạy Seeder:

```bash
php artisan db:seed
```

Hoặc chạy Migration và Seeder cùng lúc:

```bash
php artisan migrate --seed
```

## 6. Kiểm tra trạng thái Migration

```bash
php artisan migrate:status
```

## 7. Chạy dự án

```bash
php artisan serve
```

Mở trình duyệt tại:

```text
http://127.0.0.1:8000
```

## 8. Dữ liệu mẫu sau khi Seeder

| Dữ liệu | Số lượng |
|---|---:|
| Danh mục | 5 |
| Giảng viên | 3 |
| Admin | 1 |
| Sinh viên | 15 |
| Khóa học | 8 |
| Bài học | 40 |
| Câu hỏi | 80 |
| Đăng ký khóa học | 30 |
| Lượt làm bài | 3 |

**Mật khẩu tài khoản mẫu:** `12345678`