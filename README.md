# CUTCODE

# Установка и настройка проекта

Устанавливаем laravel проект:

```
composer create-project laravel/laravel
```

## Создание баз данных

Создаем 2 базы в mysql (через mysql workbench):

- для разработки (cutcode_internet_magazin)
- для тестов (cutcode_internet_magazin_test)

Настраиваем доступ в файле `.env` для разработки.

```php
/* файл .env */
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=cutcode_internet_magazin  
DB_USERNAME=root  
DB_PASSWORD=
```

Настраиваем доступ в файле `phpunit.xml` для тестов.

```php
/* файл phpunit.xml */
<env name="DB_CONNECTION" value="mysql"/>  
<env name="DB_DATABASE" value="cutcode_internet_magazin_test"/>  
<env name="DB_USERNAME" value="root"/>  
<env name="DB_PASSWORD" value=""/>
```

## Storage

Создаем simlink на storage для доступа к файлам из браузера:

```php
php artisan storage:link
```

# cutcode-shop2022

test
