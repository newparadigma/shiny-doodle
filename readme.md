## Развёртка приложения в docker окружении для разработки

1. Клонируем репозиторий: `git clone https://github.com/newparadigma1/shiny-doodle`
2. Устанавливаем необходимые права: `chmod -R 777 storage/ bootstrap/cache`
3. Устанавливаем docker и docker-compose.
4. Создаём контейнеры и собираем проект: `docker-compose up`
5. Устанавливаем зависимости проекта: `docker-compose exec app composer install` (Выполнить в 2ой консоли)
6. Применяем миграции: `docker-compose exec app php artisan migrate` (Выполнить в 2ой консоли)

После сборки проекта, контейнеры уже будут находится в рабочем состоянии.
Завершить их работу можно выполнив `CTRL + C` в консоли.


## Работа с приложением в контейнере
Приложение доступно на 80 порту, а phpmyadmin для доступа к базе на порту 8080 localhost'a
1. Запуск контейнеров с проектом:
`docker-compose up`
2. Для запуска bash в контейнере с php-fpm:
`docker-compose exec app bash`
3. Для запуска sql консоли в контейнере с mariadb:
`docker-compose exec db mysql -phomestead -u homestead -D homestead`
4. Для сохранения дампа развёрнутой в контейнере базы:
`docker-compose exec db mysqldump -phomestead -u homestead homestead | gzip > db.localbackup.sql.gz`
5. Для удаления всех контейнеров:
`docker-compose down`
