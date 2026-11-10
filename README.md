# Quản Lý Học Tập

## Hướng dẫn cài đặt dự án

1. Clone dự án về máy:
   git clone https://github.com/duchoa444/DoAnWeb_QuanLyHocTap.git
2. Cài đặt các thư viện phụ thuộc:
   composer install
3. Tạo tệp môi trường:
   cp .env.example .env
   php artisan key:generate
4. Cấu hình CSDL trong file `.env` và chạy Migration:
   php artisan migrate
5. Khởi chạy dự án:
   php artisan serve