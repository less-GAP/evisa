FROM node:slim AS node
FROM openswoole/swoole:4.12.1-php8.2
COPY --from=node /usr/local/share /usr/local/share
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /usr/local/include /usr/local/include
COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /opt /opt
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN npm install vite -g
RUN apt-get update && apt-get install procps libgmp-dev -y

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl gmp bcmath mysqli pdo pdo_mysql \
  && docker-php-ext-enable mysqli
