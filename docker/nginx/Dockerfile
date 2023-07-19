FROM nhphero/nginx-pagespeed-certbot
ENV NGINX_NO_CACHE="1" \
    APP_PORT="80"
ENV NGINX_NO_CACHE ${NGINX_NO_CACHE}
ENV APP_PORT ${APP_PORT}
COPY ./conf.d/server.conf /etc/nginx/conf.d/server.conf
RUN sed -i "s/__NGINX_NO_CACHE__/${NGINX_NO_CACHE}/g" /etc/nginx/conf.d/server.conf
RUN sed -i "s/__APP_PORT__/${APP_PORT}/g" /etc/nginx/conf.d/server.conf

