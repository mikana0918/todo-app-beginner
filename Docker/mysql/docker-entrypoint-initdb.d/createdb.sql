#
# Copy createdb.sql.example to createdb.sql
# then uncomment then set database name and username to create you need databases
#
# example: .env MYSQL_USER=appuser and need db name is myshop_db
#
#    CREATE DATABASE IF NOT EXISTS `myshop_db` ;
#    GRANT ALL ON `myshop_db`.* TO 'appuser'@'%' ;
#
#
# this sql script will auto run when the mysql container starts and the $DATA_PATH_HOST/mysql not found.
#
# if your $DATA_PATH_HOST/mysql exists and you do not want to delete it, you can run by manual execution:
#
#     docker-compose exec mysql bash
#     mysql -u root -p < /docker-entrypoint-initdb.d/createdb.sql
#

CREATE DATABASE IF NOT EXISTS `ifx_laravel_10_starter` COLLATE 'utf8_general_ci' ;
GRANT ALL ON `ifx_laravel_10_starter`.* TO 'local'@'%' ;

CREATE DATABASE IF NOT EXISTS `ifx_laravel_10_starter_testing` COLLATE 'utf8_general_ci' ;
GRANT ALL ON `ifx_laravel_10_starter_testing`.* TO 'local'@'%' ;

FLUSH PRIVILEGES ;