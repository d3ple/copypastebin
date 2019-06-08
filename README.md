# CopyPastebin
Simple copy of pastebin on laravel

## Instalation
1. Clone repository `git clone https://github.com/d3ple/copypastebin.git`
2. Go to src directory `cd copypastebin/src` and install app dependencies `composer update`
2. Go back to the root directory and build and run docker container `docker-compose build && docker-compose up -d`
3. Create app migrations `docker-compose exec php php /var/www/artisan migrate`
4. Go to `http://localhost:8080`
5. Use `docker-compose down` to shutdown the containers and network