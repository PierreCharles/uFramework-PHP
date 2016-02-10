# Launch server :
-----------------

### Install dependencies

    composer install

### Launch server

    php -S localhost:8080 -t web/

# Testing
-----------
Filtering the query result

    GET /statuses?limit=0,5&order=status_user_name&by=DESC
    GET /statuses?limit=2,4&order=status_id&by=ASC
    GET /statuses?limit=0,10&order=status_user_name
    GET /statuses?order=status_date
    GET /statuses?limit=0,5

Php Unit : In a terminal, try this commands:

    php vendor/phpunit/phpunit/phpunit

In a terminal, try these commands:

    curl -XGET -H "Accept: application/json" http://localhost:8080/statuses
    curl -XGET -H "Accept: application/json" http://localhost:8080/statuses/1
    curl -XGET -H "Accept: application/json" http://localhost:8080/statuses/1000

Also, try to create new statuses using JSON:

    curl -XPOST -H "Accept: application/json" -H 'Content-Type: application/json' \
    -d '{ "user": "picharles", "message": "Je suis un TweetTweet de test"}' \
    http://localhost:8080/statuses

### Fixer

    php vendor/fabpot/php-cs-fixer/php-cs-fixer fix src/

### Realized tasks
------------------

    - Routes
    - Using the request
    - Post, get, Delete Resource
    - DataMapper (User and Status)
    - Entity (User and Status)
    - Database connection
    - DataFinder (User and Status)
    - Authentication
    - Login, register, status, statuses view
    - Filtering the results
    - Firewall with a dispatcher
    - Use composer
    - Validation and verification for all parameters
    - Mock connection
    - Unit tests
    - Functional tests
    - Fix with php-cs-fixer


Anatomy of &micro;Framework
---------------------------

The directory layout looks like this:

    ├ app/      # the application directory
    ├ src/      # the framework sources
    ├ tests/    # the test suite
    ├ web/      # public directory

### `app` directory

Your application controllers will be registered as closures in `app.php`.
Templates will be put into the `templates/` directory.

### `src` directory

The framework sources. You will have to complete the missing parts.

### `tests` directory

The test suite, all tests have to pass at the end :)

### `web` directory

Contains the public files. Most of the time, we put assets (CSS, JS files)
and a `index.php` file.

The `index.php` file is the only entry point of this application.  It is called
a **front controller**.

