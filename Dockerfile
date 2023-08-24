FROM node:19 as admin
#LABEL stage=frontend
# make the 'app' folder the current working directory
WORKDIR /app

# copy both 'package.json' and 'package-lock.json' (if available)
COPY ./Modules/Admin/package*.json ./
# install project dependencies
RUN npm install
COPY ./Modules/Admin .
# build app for production with minification
RUN npm run build

FROM node:19 AS node
FROM openswoole/swoole:4.12.1-php8.2
COPY --from=node /usr/local/share /usr/local/share
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /usr/local/include /usr/local/include
COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /opt /opt
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
WORKDIR /app
COPY --from=admin /app/public ./public/cpn1234
COPY ./ .
RUN mkdir ./storage
RUN mkdir ./storage/logs
RUN mkdir ./storage/upload
RUN mkdir ./storage/framework
RUN mkdir ./storage/framework/cache
RUN mkdir ./storage/framework/sessions
RUN mkdir ./storage/framework/testing
RUN mkdir ./storage/framework/views
# install project dependencies
RUN npm install
# build app for production with minification
RUN npm run build
RUN rm -rf ./node_modules
RUN rm -rf ./public/hot
RUN composer self-update
RUN apt-get update && apt-get install procps libzip-dev zip redis libgmp-dev supervisor -y
RUN pecl install redis && docker-php-ext-enable redis
RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install zip pcntl  exif gmp bcmath mysqli pdo pdo_mysql  \
  && docker-php-ext-enable mysqli
COPY ./docker/supervisor/supervisord.conf /etc/supervisor
COPY ./docker/supervisor/conf.d/* /etc/supervisor/conf.d
COPY php.ini /usr/local/etc/php/php.ini
CMD ["/usr/bin/supervisord"]

