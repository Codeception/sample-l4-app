# Laravel Application Codeception testing.

### Setup

- Clone repo
- `composer install`
- Create database: `l4-module`.
- Update MySQL config in `app/config/database.php`
- Command line: run `php artisan migrate --seed`
- Server: run `php artisan serve`
- Browse to localhost:8000/posts
- Enter `john@doe.com` as username, and `password` as the password

### To test

Run Codeception, installed via Composer 

```
./vendor/bin/codecept run
```

## Tests 

Please check out some [good test examples](https://github.com/Codeception/sample-l4-app/tree/master/tests) provided.

### Functional Tests

Demonstrates testing of

* CRUD application
* authentication (by user, credentials, http auth)
* usage of session variables
* routes
* creating and checking records in database

### CLI Tests

Demonstrates testing of Artisan commands. See `CliHelper` to learn how to perform cleanup between tests, and create cutom `runArtisan` command

### API Tests

Demonstrates functional testing of APIs using REST and Laravel4 modules connected, with

* partial json inclusion in response
* GET/POST/PUT/DELETE requests
* check changes inside database

