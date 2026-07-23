FROM php:8.1-cli

# Install ekstensi MySQL untuk CodeIgniter 3
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set folder kerja ke root project
WORKDIR /var/www/html
COPY . .

# Jalankan PHP server dengan router bawaan CodeIgniter
CMD php -S 0.0.0.0:${PORT:-8080} index.php