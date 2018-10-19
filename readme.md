<p align="center"><img src="https://porloscerros.github.io/img/portada-logo.svg"></p>
<h1 align="center">Matria site</h1>
<h3 align="center">Website to show the works of the craftswoman Matria</h3>

This project was created based on [Laravel-blog](https://github.com/guillaumebriday/laravel-blog)

## Documentation

### Tecnologies
- [Laravel 5.7](http://laravel.com/)

Beside Laravel, this project uses other tools like:

- [Bootstrap 4](https://getbootstrap.com/)
- [PHP-CS-Fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer)
- [Travis CI](https://travis-ci.org/)
- [Font Awesome](http://fontawesome.io/)
- [Vue.js](https://vuejs.org/)
- [axios](https://github.com/mzabriskie/axios)
- [Redis](https://redis.io/)
- [spatie/laravel-medialibrary](https://github.com/spatie/laravel-medialibrary)
- Many more to discover.

You can find it on : [matria-tallados.com.ar](https://matria-tallados.com.ar)

### Installation

Development environment requirements :
- [Docker](https://www.docker.com) >= 17.06 CE
- [Docker Compose](https://docs.docker.com/compose/install/)

Setting up your development environment on your local machine :
```
$ git clone git@github.com:porloscerros/matria.git
$ cd matria
$ cp .env.example .env
$ docker-compose run --rm --no-deps matria-server composer install
$ docker-compose run --rm --no-deps matria-server php artisan key:generate
$ docker-compose run --rm --no-deps matria-server php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider"
$ docker-compose run --rm --no-deps matria-server php artisan storage:link
$ docker run --rm -it -v $(pwd):/app -w /app node npm install
$ docker-compose up -d
```

Now you can access the application via [http://localhost:8000](http://localhost:8000).

#### Before starting
You need to run the migrations with the seeds :
```
$ docker-compose run --rm matria-server php artisan migrate --seed
```

This will create a new user that you can use to sign in :
```
Email : darthvader@deathstar.ds
Password : 4nak1n
```

And then, compile the assets :
```
$ docker run --rm -it -v $(pwd):/app -w /app node npm run dev
```

Starting job for newsletter :
```
$ docker-compose run matria-server php artisan tinker
> PrepareNewsletterSubscriptionEmail::dispatch();
```

#### Useful commands
Seeding the database :
```
$ docker-compose run --rm matria-server php artisan db:seed
```

Running tests :
```
$ docker-compose run --rm matria-server ./vendor/bin/phpunit --cache-result --order-by=defects --stop-on-defect
```

Running php-cs-fixer :
```
$ docker-compose run --rm --no-deps matria-server ./vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --dry-run --diff
```

Generating backup :
```
$ docker-compose run --rm matria-server php artisan backup:run
```

Generating fake data :
```
$ docker-compose run --rm matria-server php artisan db:seed --class=DevDatabaseSeeder
```

Discover package
```
$ docker-compose run --rm --no-deps matria-server php artisan package:discover
```

In development environnement, rebuild the database :
```
$ docker-compose run --rm matria-server php artisan migrate:fresh --seed
```

#### Accessing the API

Clients can access to the REST API. API requests require authentication via token. You can create a new token in your user profile.

Then, you can use this token either as url parameter or in Authorization header :

```
# Url parameter
GET http://matria.app/api/v1/posts?api_token=your_private_token_here

# Authorization Header
curl --header "Authorization: Bearer your_private_token_here" http://matria.app/api/v1/posts
```

API are prefixed by ```api``` and the API version number like so ```v1```.

Do not forget to set the ```X-Requested-With``` header to ```XMLHttpRequest```. Otherwise, Laravel won't recognize the call as an AJAX request.

To list all the available routes for API :

```bash
$ docker-compose run --rm --no-deps matria-server php artisan route:list --path=api
```

## License

This project is released under the [MIT](http://opensource.org/licenses/MIT) license.
