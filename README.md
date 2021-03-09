# Прототип системы управления баннерами

СТРУКТУРА КАТАЛОГОВ
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      modules/            contains module classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

### Требования
    Ubuntu or Debian
    php 7.2^
    Docker
    docker-compose

Сборка
------------

### Копируем к себе проект
~~~
cp git/this_repository
~~~

### Сгенерировать cookieValidationKey или оставить существующий

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

### Переходим в директорию проекта

~~~
cd banner-management--system
~~~

### Выполняем ритуалы с docker-compose
#### Собираем образ

~~~
docker-compose build
~~~

#### Запускаем

~~~
docker-compose up -d
~~~

#### Запускаем миграции

~~~
docker-compose exec php php yii migrate
~~~

Затем вы поидее можете получить доступ к приложению по следующему URL-адресу:

~~~
http://localhost:8312
~~~

Документация к API `doc/ApiDocumentation.md`
