# Bán cây cảnh 
## Yêu cầu hệ thống
 - PHP >= 7.1.3
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
    - Ctype PHP Extension
    - JSON PHP Extension
    - BCMath PHP Extension
 - MySQL >= 5.6
 - nginx hoặc apache
 - phpMyAdmin hoặc công cụ quản lý database khác
 - php composer

## Cài đặt 
  - Định nghĩa trong tài liệu này: 
    - `Terminal` là cửa sổ nhập lệnh, ở Windows OS là Power Shell hoặc Command Prompt, trên các hệ điều hành linux hoặc macOS được gọi là Terminal
    - `Thư mục gốc` là thư mục của dự án này, ở đây chính là thư mục chứa file tài liệu bạn đang đọc đây. 
  - Nhập database: 
    - Truy cập vào phpMyAdmin
    - Trong giao diện quản lý của phpMyAdmin, Bạn chọn `Import`
    - Trong khung File to import hãy chọn file `bancaycanh.txt` được lấy từ trong thư mục gốc sau đó ấn nút `Go` tại dưới cùng của giao diện.
  - Tạo private key
    - Trong terminal, gõ lệnh sau để tạo `Application Key`
       ```
       php artisan key:generate
       ```
  - Cập nhật cấu hình kết nối database  
  Hãy cập nhật thông tin đăng nhập để kết nối đến database của bạn tại file `/{Thư mục gốc}/config/database.php`
  - Cập nhật các thư viện bằng composer 
    - Trong Terminal, gõ lệnh sau:
        ```
        composer install
        composer update
        ```
### Môi trường phát triển
 - Để khởi động hệ thống, trong Terminal các bạn chạy dòng lệnh sau:   
    ```
   php artisan serve  
    ```
    server sẽ được khởi động tại cổng 8000, hãy truy cập http://127.0.0.1:8000 để xem trang web bán cây cảnh.
    > với trường hợp cổng 8000 đã được sử dụng, hãy thêm `--port=XXXX` với `XXXX` là cổng còn khả dụng.

### Áp dụng trên server
- Với apache hoặc nginx, bạn hãy tạo thêm virtual host mới với document root tại `/{Thư mục gốc}/public/`

- Cấu hình `apache`
    ```
    ...

    Options +FollowSymLinks -Indexes
    RewriteEngine On

    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]

    ...
    ```
- Cấu hình `nginx`
    ```
    ...

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    ...
    ```

### Các thông tin gỡ lỗi:
thông tin gỡ lỗi được ghi lại tại `/{Thư mục gốc}/storage/logs`
