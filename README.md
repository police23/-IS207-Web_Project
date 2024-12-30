# Webfone Project

## Giới thiệu
Dự án Webfone là một hệ thống quản lý bán điện thoại di động được phát triển bằng framework Laravel. Hệ thống sử dụng cơ sở dữ liệu MySQL và chạy trên XAMPP để hỗ trợ phát triển và triển khai dễ dàng.

## Yêu cầu hệ thống

- **PHP**: >= 8.0
- **Composer**: >= 2.x
- **XAMPP**: MySQL và Apache (cài đặt tại [xampp.org](https://www.apachefriends.org/))
- **Node.js**: >= 14.x (để quản lý tài nguyên front-end)

## Hướng dẫn cài đặt

### Bước 1: Clone dự án
Clone dự án từ repository GitHub:
```bash
git clone https://github.com/police23/IS207-SellPhones_Project.git
```

Di chuyển vào thư mục dự án:
```bash
cd repository
```

### Bước 2: Cài đặt Composer
Cài đặt các gói phụ thuộc của Laravel:
```bash
composer install
```

### Bước 3: Cấu hình môi trường
Tạo file `.env` từ file mẫu `.env.example`:
```bash
cp .env.example .env
```

Chỉnh sửa file `.env` để cấu hình cơ sở dữ liệu:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webfone
DB_USERNAME=root
DB_PASSWORD=
```

### Bước 4: Tạo database
1. Mở XAMPP và khởi động **Apache** và **MySQL**.
2. Truy cập [phpMyAdmin](http://localhost/phpmyadmin).
3. Tạo một database mới với tên `webfone`.

### Bước 5: Chạy migration và seed
Thực thi các migration để tạo bảng trong database:
```bash
php artisan migrate
```

Nếu có dữ liệu mẫu, chạy lệnh seed:
```bash
php artisan db:seed
```

### Bước 6: Cài đặt Node.js và biên dịch tài nguyên front-end
Cài đặt các gói npm:
```bash
npm install
```

Biên dịch tài nguyên front-end:
```bash
npm run dev
```

### Bước 7: Khởi chạy dự án
Khởi động server Laravel:
```bash
php artisan serve
```

Truy cập ứng dụng tại [http://localhost:8000](http://localhost:8000).

## Các lệnh hữu ích

### Xóa cache

Nếu gặp lỗi liên quan đến cache, bạn có thể xóa cache bằng các lệnh sau:
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Reset database
Để làm mới cơ sở dữ liệu (xóa và chạy lại migration):
```bash
php artisan migrate:refresh --seed
```

### Chạy trên cổng khác
Nếu muốn khởi chạy trên cổng khác, sử dụng lệnh:
```bash
php artisan serve --port=8080
```

## Tham khảo
- [Laravel Documentation](https://laravel.com/docs)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
