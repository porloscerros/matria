<p align="center"><img src="https://porloscerros.github.io/img/portada-logo.svg"></p>
<h1 align="center">Laravel Web Site</h1>
<h3 align="center">Generic web site made in Laravel 5.7</h3>

Adapted from [Laravel-blog](https://github.com/guillaumebriday/laravel-blog)

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

You can find it on : 

### Installation

Development environment requirements :
- [Docker](https://www.docker.com) >= 17.06 CE
- [Docker Compose](https://docs.docker.com/compose/install/)

Setting up your development environment on your local machine :
```
$ git clone git@github.com:porloscerros/laravel-web-site.git
$ cd laravel-web-site
$ cp .env.example .env
$ docker-compose run --rm --no-deps laravel-web-site-server composer install
$ docker-compose run --rm --no-deps laravel-web-site-server php artisan key:generate
$ docker-compose run --rm --no-deps laravel-web-site-server php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider"
$ docker-compose run --rm --no-deps laravel-web-site-server php artisan storage:link
$ docker run --rm -it -v $(pwd):/app -w /app node npm install
$ docker-compose up -d
```

Now you can access the application via [http://localhost:8000](http://localhost:8000).

#### Before starting
You need to run the migrations with the seeds :
```
$ docker-compose run --rm laravel-web-site-server php artisan migrate --seed
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

Contact Form Config :

We will use Mailgun to receive by email the messages that people send us from the Contact Form.

In our Mailgun profile we have the option to configure a custom domain or use a subdomain created automatically for tests, for now we will take the second option.

In the Mailgun Subdomains section click on the link to see the access credentials.

And then replace the credentials in the .env file:
```
MAIL_DRIVER=mailgun
MAILGUN_DOMAIN=sandbox_____________________________.mailgun.org
MAILGUN_SECRET=key-______________________________
```
Also add the name and email address of who will receive the messages:
```
ADMIN_EMAIL=
ADMIN_NAME=
```

Starting job for newsletter :
```
$ docker-compose run laravel-web-site-server php artisan tinker
> PrepareNewsletterSubscriptionEmail::dispatch();
```

#### Useful commands
Seeding the database :
```
$ docker-compose run --rm laravel-web-site-server php artisan db:seed
```

Running tests :
```
$ docker-compose run --rm laravel-web-site-server ./vendor/bin/phpunit --cache-result --order-by=defects --stop-on-defect
```

Running php-cs-fixer :
```
$ docker-compose run --rm --no-deps laravel-web-site-server ./vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --dry-run --diff
```

Generating backup :
```
$ docker-compose run --rm laravel-web-site-server php artisan backup:run
```

Generating fake data :
```
$ docker-compose run --rm laravel-web-site-server php artisan db:seed --class=DevDatabaseSeeder
```

Discover package
```
$ docker-compose run --rm --no-deps laravel-web-site-server php artisan package:discover
```

In development environnement, rebuild the database :
```
$ docker-compose run --rm laravel-web-site-server php artisan migrate:fresh --seed
```

#### Accessing the API

Clients can access to the REST API. API requests require authentication via token. You can create a new token in your user profile.

Then, you can use this token either as url parameter or in Authorization header :

```
# Url parameter
GET http://laravel-web-site.app/api/v1/posts?api_token=your_private_token_here

# Authorization Header
curl --header "Authorization: Bearer your_private_token_here" http://laravel-web-site.app/api/v1/posts
```

API are prefixed by ```api``` and the API version number like so ```v1```.

Do not forget to set the ```X-Requested-With``` header to ```XMLHttpRequest```. Otherwise, Laravel won't recognize the call as an AJAX request.

To list all the available routes for API :

```bash
$ docker-compose run --rm --no-deps laravel-web-site-server php artisan route:list --path=api
```

## License

This project is released under the [MIT](http://opensource.org/licenses/MIT) license.
