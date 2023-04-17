# 環境構築メモ

## git clone後

```bash
docker-compose run --no-deps laravel.test /bin/bash -lc "/usr/bin/composer install"
docker-compose up -d laravel.test
docker-compose exec laravel.test php artisan migrate
docker-compose exec laravel.test npm install
docker-compose exec laravel.test npm run build
```
