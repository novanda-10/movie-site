FROM php:8.4.12

# نصب ابزارهای پایه، Node.js و SQLite
RUN apt-get update -y && apt-get install -y \
    curl openssl zip unzip git sqlite3 libsqlite3-dev

# نصب Node.js (برای build کردن Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# نصب Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# نصب اکستنشن‌های PHP لازم برای Laravel + SQLite
RUN docker-php-ext-install pdo pdo_sqlite

# اطمینان از نصب بودن mbstring
RUN php -m | grep mbstring || docker-php-ext-install mbstring

# تنظیم مسیر کاری
WORKDIR /app

# کپی سورس‌کد پروژه داخل کانتینر
COPY . /app

# نصب وابستگی‌های PHP
RUN composer install --no-dev --optimize-autoloader

# نصب وابستگی‌های Node و build کردن فایل‌های Vite
RUN npm ci && npm run build

# ساخت فایل دیتابیس SQLite اگر وجود نداشت
RUN mkdir -p /app/database && touch /app/database/database.sqlite

# ساخت storage symlink (در صورت نیاز)
RUN php artisan storage:link || true

# باز کردن پورت 8000
EXPOSE 8000

# اجرای سرور لاراول
CMD php artisan serve --host=0.0.0.0 --port=8000
