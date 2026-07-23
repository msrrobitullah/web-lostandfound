FROM php:8.1-apache

# Matikan modul MPM lain agar tidak bentrok dengan prefork
RUN a2dismod mpm_event mpm_worker || true \
    && a2enmod mpm_prefork rewrite

# Install ekstensi MySQL untuk CodeIgniter
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Sesuaikan port Apache dengan environment Variable PORT milik Railway
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Copy kodingan website ke folder web Apache
COPY . /var/www/html/

# Beri hak akses penuh ke folder project
RUN chown -R www-data:www-data /var/www/html