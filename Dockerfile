FROM php:8.1.10-fpm

# Set working directory
WORKDIR /var/www

# Install system packages + Node.js 18
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    zip \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    gnupg \
    build-essential && \
    curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install Node dependencies and build Vite assets
RUN npm install && npm run build

# # COPY Vite build output to public directory (important!)
# RUN cp -r public/build public_html/build

# Set permissions
RUN chown -R www-data:www-data /var/www && chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 8000

# Laravel serve with pre-boot setup
CMD php artisan migrate --force \
    && php artisan config:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan serve --host=0.0.0.0 --port=8000
