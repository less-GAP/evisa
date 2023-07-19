FROM openswoole/swoole

RUN apt-get update && apt-get install procps libgmp-dev -y
RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl gmp bcmath

