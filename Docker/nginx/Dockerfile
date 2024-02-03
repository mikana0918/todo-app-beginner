FROM nginx:1.25.1-bookworm

COPY nginx.conf /etc/nginx/

# If you're in China, or you need to change sources, will be set CHANGE_SOURCE to true in .env.

# ARG CHANGE_SOURCE=false
# RUN if [ ${CHANGE_SOURCE} = true ]; then \
#     # Change application source from dl-cdn.alpinelinux.org to aliyun source
#     sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/' /etc/apk/repositories \
# ;fi

RUN apt-get update \
    && apt-get -y upgrade \
    && apt-get -y install bash openssl \
    && adduser --disabled-password --home "$(pwd)" --uid "1000" web \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

ARG PHP_UPSTREAM_CONTAINER
ARG PHP_UPSTREAM_PORT

# Set upstream conf and remove the default conf
#RUN echo "upstream php-upstream { server 127.0.0.1:9000; }" > /etc/nginx/conf.d/upstream.conf \
RUN echo "upstream php-upstream { server ${PHP_UPSTREAM_CONTAINER}:${PHP_UPSTREAM_PORT}; }" > /etc/nginx/conf.d/upstream.conf \
    && rm /etc/nginx/conf.d/default.conf

COPY entrypoint.sh /tmp/entrypoint.sh
RUN chmod a+x /tmp/entrypoint.sh && \
    /bin/bash -c "source /tmp/entrypoint.sh /etc/nginx/ *.localhost" && \
    chmod 400 /etc/nginx/server.key

CMD ["nginx"]

EXPOSE 80 443