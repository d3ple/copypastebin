![alt text](https://i.imgur.com/N0QPPYk.png "CopyPastebin logo")

# CopyPastebin [![codecov](https://codecov.io/gh/d3ple/copypastebin/branch/master/graph/badge.svg)](https://codecov.io/gh/d3ple/copypastebin)
Простой аналог сервиса Pastebin на Laravel

## Реализованные функции
- [x] Срок в течение которого "паста" будет доступна по ссылке: 10 мин., 1 час, 3 часа, 1 день, 1 неделя, 1 месяц, без ограничения. После окончания срока получить доступ к "пасте" нельзя.

- [x] Ограничение доступа:
public — доступна всем, видна в списках
unlisted — доступна только по ссылке

- [x] Для загруженной пасты выдается короткая ссылка вида http://my-little-pastebin.kz/{какой-то-рандомный-хэш}

- [x]  Просмотр пасты по прямой ссылке.

- [x] На всех страницах сайта, включая страницу загрузки и страницу просмотра, по прямой ссылке пользователь видит блок с последними 10 public-пастами.

- [x] Все пасты, у которых вышел срок доступности, не видны никому, в том числе и автору.

- [x] Регистрацию и авторизация по логину/паролю и через соцсети

- [x] Для "пасты" можно выбирать язык, тогда при выводе синтаксис выбранного языка должен подсвечиваться. 

- [x] На всех страницах авторизованный пользователь видит дополнительный блок с последними 10 своими пастами.

- [x] Зарегистрированный пользователь имеет отдельную страницу, где видит список всех своих паст с пагинацией.

- [x]  Возможность выбора ограничения доступа "private" для "пасты" авторизованного пользователя. Такая паста будет доступна только одному авторизовавшемуся пользователю - автору.

- [x] Код покрыт тестами более чем на 50%: https://codecov.io/gh/d3ple/copypastebin

- [x] Проект упакован в Docker-контейнер

## Запуск
Для запуска требуются:
* GIT
* Composer
* Docker

Инструкция для развертывания:
1. Копировать репозиторий `git clone https://github.com/d3ple/copypastebin.git`
2. Перейти в директорию src `cd copypastebin/src` и установить зависимости для проекта `composer update`
2. Вернуться в главную директорию, построить и запустить Docker контейнер `docker-compose build && docker-compose up -d`
3. Создать таблицы БД `docker-compose exec php php /var/www/artisan migrate`, 
    * Если выдаст ошибку, то выполнить комманду еще раз
4. Открыть `http://localhost:8080` в браузере
5. Чтобы выключить контейнер использовать `docker-compose down`



# CopyPastebin
Simple copy of Pastebin on Laravel

## Deployment

Required for deployment:
* GIT
* Composer
* Docker

Instruction:
1. Clone repository `git clone https://github.com/d3ple/copypastebin.git`
2. Go to src directory `cd copypastebin/src` and install app dependencies `composer update`
2. Go back to the root directory and build and run docker container `docker-compose build && docker-compose up -d`
3. Create app migrations `docker-compose exec php php /var/www/artisan migrate`. Repeat in case of error.
4. Go to `http://localhost:8080`
5. Use `docker-compose down` to shutdown the containers and network
