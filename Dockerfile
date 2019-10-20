FROM php:7.3.0-apache
COPY src/ /var/www/html
RUN find /var/www/html/ -type d -exec chmod 755 {} \; &&\
    find /var/www/html/ -type f -exec chmod 644 {} \;
EXPOSE 80