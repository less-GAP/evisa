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
FROM registry.digitalocean.com/lessgap/laravel-php82:latest
WORKDIR /app
RUN npm install -g http-server
ARG APP_ADMIN
RUN echo ${APP_ADMIN}
COPY --from=admin /app/public ./public/${APP_ADMIN}
RUN mkdir ./storage
RUN mkdir ./storage/logs
RUN mkdir ./storage/upload
RUN mkdir ./storage/framework
RUN mkdir ./storage/framework/cache
RUN mkdir ./storage/framework/sessions
RUN mkdir ./storage/framework/testing
RUN mkdir ./storage/framework/views
# install project dependencies
COPY ./package.json .

RUN npm install
COPY ./ .
COPY ./.env.production ./.env
# build app for production with minification
RUN npm run build
RUN rm -rf ./public/hot
RUN composer install
COPY ./docker/supervisor/supervisord.conf /etc/supervisor
COPY ./docker/supervisor/conf.d/* /etc/supervisor/conf.d
COPY php.ini /usr/local/etc/php/php.ini
CMD ["/usr/bin/supervisord"]

