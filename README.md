﻿# BookLib
 ## Установка:
 Клонируем репозиторий и переходим в каталог
```
git clone https://github.com/IzzyNety/BookLib.git bookLib
cd bookLib
```

Задаем подключение к базе данных
```
echo DATABASE_URL=mysql://root:root@127.0.0.1:3306/booklib >> .env.local
```
Устанавливаем зависимости
```
composer install
```
Добавляем базу в sql
```
php bin/console doctrine:database:create
```

Применяем миграции
```
php bin/console doctrine:migrations:migrate
```
Запускаем локальный сервер
```
symfony serve
```
