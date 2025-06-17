# Use official PHP image with necessary extensions
FROM php:8.1.10-fpm
# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libpq-dev \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel project files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions (optional but good for production)
RUN chown -R www-data:www-data /var/www

# Expose port and launch
EXPOSE 8000
RUN chmod -R 775 storage bootstrap/cache
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]