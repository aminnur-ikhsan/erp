# Menggunakan PHP sebagai base image
FROM php:8.2-cli
# FROM php:8.2-fpm as builder

# Memperbarui paket dan menginstall beberapa tools dan dependensi untuk Laravel 11
RUN apt update && apt install -y \
    curl \
    nano \
    net-tools \
    iputils-ping \
    zip \
    unzip \
    telnet \
    libzip-dev \
    libpng-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    git

# Install PHP extensions yang dibutuhkan Laravel 11
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Installing composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Set working directory
WORKDIR /home/app

# Menambahkan Port Publish
EXPOSE 8000

# # Menjalankan php server ketika container di-start
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

# # Keep container running (oly for download laravel)
# CMD ["tail", "-f", "/dev/null"]
