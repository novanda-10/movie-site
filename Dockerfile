FROM php:8.4.12

# نصب ابزارهای پایه و SQLite
RUN apt-get update -y && apt-get install -y \
    openssl zip unzip git sqlite3 libsqlite3-dev

# نصب Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# نصب اکستنشن‌های PHP لازم برای Laravel + SQLite
RUN docker-php-ext-install pdo pdo_sqlite

# (اختیاری) اگر mbstring نصب نیست، آن را نصب کن
RUN php -m | grep mbstring || docker-php-ext-install mbstring

# تنظیم مسیر کاری
WORKDIR /app

# کپی سورس‌کد پروژه داخل کانتینر
COPY . /app

# نصب وابستگی‌های Composer
RUN composer install

# ساخت فایل دیتابیس SQLite اگر وجود نداشت
RUN mkdir -p /app/database && touch /app/database/database.sqlite

# باز کردن پورت 8000
EXPOSE 8000

# اجرای سرور لاراول
CMD php artisan serve --host=0.0.0.0 --port=8000
