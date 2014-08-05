# Sample Laravel Application with Codeception tests.

[![Build Status](https://travis-ci.org/Codeception/sample-l4-app.svg?branch=master)](https://travis-ci.org/Codeception/sample-l4-app)

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

Demonstrates testing of [CRUD application](https://github.com/Codeception/sample-l4-app/blob/master/tests/functional/PostCrudCest.php) with

* [PageObjects](https://github.com/Codeception/sample-l4-app/blob/master/tests%2Ffunctional%2F_pages%2FPostsPage.php)
* [authentication](https://github.com/Codeception/sample-l4-app/blob/master/tests%2Ffunctional%2FAuthCest.php) (by user, credentials, http auth)
* usage of session variables
* [routes](https://github.com/Codeception/sample-l4-app/blob/master/tests%2Ffunctional%2FRoutesCest.php)
* creating and checking records in database

### CLI Tests

Demonstrates [testing of Artisan commands](https://github.com/Codeception/sample-l4-app/blob/master/tests%2Fcli%2FGenerateRepositoryCept.php). See [CliHelper](https://github.com/Codeception/sample-l4-app/blob/master/tests/_support/CliHelper.php) to learn how to perform cleanup between tests, and create cutom `runArtisan` command

### API Tests

Demonstrates functional [testing of API](https://github.com/Codeception/sample-l4-app/blob/master/tests%2Fapi%2FPostsResourceCest.php) using REST and Laravel4 modules connected, with

* partial json inclusion in response
* GET/POST/PUT/DELETE requests
* check changes inside database

