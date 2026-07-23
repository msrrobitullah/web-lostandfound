FROM php:8.1-apache

# Install ekstensi MySQL untuk CodeIgniter
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Aktifkan mod_rewrite untuk URL CodeIgniter
RUN a2enmod rewrite

# Ganti port default 80 ke port dinamis Railway ($PORT)
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Copy seluruh file project ke folder root web Apache
COPY . /var/www/html/

# Atur permission
RUN chown -R www-data:www-data /var/www/html

# Jalankan Apache secara foreground bawaan PHP
CMD ["apache2-foreground"]