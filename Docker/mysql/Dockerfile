FROM mysql:8

ARG TZ=UTC
ENV TZ ${TZ}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone && chown -R mysql:root /var/lib/mysql/

COPY my.cnf /etc/mysql/conf.d/my.cnf
COPY docker-entrypoint-initdb.d/createdb.sql /docker-entrypoint-initdb.d/

CMD ["mysqld"]

EXPOSE 3306