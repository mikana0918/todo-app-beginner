
## 環境構築
```bash
$ cp .env.example .env
$ cp .env.testing.example .env.testing
$ docker-compose up -d
$ docker-compose exec php-fpm bash
$ cd laravel-v10-starter
/var/www $ cd laravel-v10-starter
/var/www/laravel-v10-starter $ composer install
/var/www/laravel-v10-starter $ php artisan key:generate
/var/www/laravel-v10-starter $ php artisan migrate
```

URL:http://api.laravel-v10-starter.localhost  

## Dockerビルドのときに、debian等パッケージが取得できないといわれるとき
$ sudo vi /etc/docker/daemon.json
```json
{
  "dns": ["8.8.8.8", "8.8.4.4"]
}
```
