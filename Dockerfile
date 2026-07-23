FROM php:8.1-apache

# Hapus semua modul MPM yang aktif bawaan agar tidak bentrok (Penyebab error More than one MPM loaded)
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load /etc/apache2/mods-enabled/mpm_*.conf

# Aktifkan mpm_prefork dan mod_rewrite
RUN a2enmod mpm_prefork rewrite

# Install ekstensi MySQL untuk CodeIgniter 3
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ubah port Apache agar membaca variable PORT dari Railway
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Copy seluruh file project ke server
COPY . /var/www/html/

# Atur permission folder web
RUN chown -R www-data:www-data /var/www/html

CMD ["apache2-foreground"]