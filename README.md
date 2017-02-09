Symfony Test Task
=================

[![Build Status][testing-image]][testing-link]
[![Scrutinizer Code Quality][scrutinizer-code-quality-image]][scrutinizer-code-quality-link]
[![Code Coverage][code-coverage-image]][code-coverage-link]

A Symfony project created on February 6, 2017, 11:39 pm.

Requeirements
-------------
* PHP 7.1
* MySQL 5.7
* Node.js >=6
* npm, bower, gulp, sass
* Composer
* Supports AngularJS

Installation
------------
* Install libraries:
```
    composer install
```
* Build assets:
```
    npm i
    bower i
    gulp
```
* Create database, execute migrations and fixtures:
```
    php bin/console app:db:reload
```

Demo credentials
----------------
Users:
* Username: `demo`, Password: `demo` has 3 times for search
* Username: `admin`, Password: `admin` has 5 times for search

[testing-link]: https://travis-ci.org/ilyashaptala/symfony-test-task
[testing-image]: https://travis-ci.org/ilyashaptala/symfony-test-task.svg?branch=master
[code-coverage-link]: https://scrutinizer-ci.com/g/ilyashaptala/symfony-test-task/?branch=master
[code-coverage-image]: https://scrutinizer-ci.com/g/ilyashaptala/symfony-test-task/badges/coverage.png?b=master
[scrutinizer-code-quality-link]: https://scrutinizer-ci.com/g/ilyashaptala/symfony-test-task/?branch=master
[scrutinizer-code-quality-image]: https://scrutinizer-ci.com/g/ilyashaptala/symfony-test-task/badges/quality-score.png?b=master
