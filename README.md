# Hướng dẫn cài đặt và chạy dự án

## 1. Cài đặt môi trường

Yêu cầu:
- PHP 8.3 trở lên
- Composer
- Node.js & NPM
- Laravel 12
- SQLite

## 2. Cài đặt thư viện và biên dịch giao diện

Mở Terminal tại thư mục dự án và chạy các lệnh sau:

```bash
composer install
npm install
npm run build
```

## 3. Khởi tạo dữ liệu và chạy ứng dụng

Tạo file cấu hình môi trường nếu chưa có, sau đó cấu hình kết nối database trong `.env`:

```bash
copy .env.example .env
php artisan key:generate
```

Khởi tạo cấu trúc database và dữ liệu khóa học mẫu:

```bash
php artisan migrate --seed
```

Chạy ứng dụng:

```bash
php artisan serve
```

Mở URL được hiển thị trong terminal. Trang chủ tự chuyển đến danh sách khóa học; danh sách lấy các khóa học đã xuất bản trong database. Chạy `php artisan test` để kiểm tra các luồng cơ bản.