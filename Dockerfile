FROM vernonco/nginx-php-fpm:php7
COPY ./app /var/www/html
RUN mkdir /session && chown nginx /session
EXPOSE 80
