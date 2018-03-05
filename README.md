# Logbook (0.1.1)

## What is it?

Simple wrapper for interaction with [Monolog](https://github.com/Seldaek/monolog)'s Registry system allowing legacy systems to benefit modern logging.

For more complex Monolog setups with multiple channels and handlers a better solutions would be [Monolog Cascade](https://github.com/theorchard/monolog-cascade).

## Installation

Can be installed using composer by running the following:

```sh
$ composer require cruxoft/logbook
```

## Usage

A simple but common usage of Logbook would be as follows: 

```php
use Cruxoft\Logbook;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

// Generate one or more handlers
$handler = new StreamHandler("./sample.log", Logger::ERROR);

// Add a log channel with specified handlers, optional processors can also be added
Logbook::add("my_log_channel", array($handler));

// Raising a log, standard monolog methods can be used eg. error() err(), addError()
Logbook::get("my_log_channel")->error("This is just an example");
```
