# laravel-codepen

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/laravel-codepen/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-codepen)
[![License](https://poser.pugx.org/unicodeveloper/laravel-codepen/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/unicodeveloper/laravel-codepen.svg)](https://travis-ci.org/unicodeveloper/laravel-codepen)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/laravel-codepen.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/laravel-codepen)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/laravel-codepen.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/laravel-codepen)

> Laravel 5 Package to work with Codepen. Very easy to use. Offers the use of Facades and Dependency Injection

## Installation

[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

First, pull in the package through Composer.

``` bash
$ composer require unicodeveloper/laravel-codepen
```

Another alternative is to simply add the following line to the require block of your `composer.json` file.

```
"unicodeveloper/laravel-codepen": "1.0.*"
```

Then run `composer install` or `composer update` to download it and have the autoloader updated.

Add this to your providers array in `config/app.php`

```php
// Laravel 5: config/app.php

'providers' => [
    ...
    Unicodeveloper\Codepen\CodepenServiceProvider::class,
    ...
];
```

This package also comes with a facade

```php
// Laravel 5: config/app.php

'aliases' => [
    ...
    'Codepen' => Unicodeveloper\Codepen\Facades\Codepen::class,
    ...
]
```

Publish the config file by running:

```bash
php artisan vendor:publish
```

The config file will now be located at `config/codepen.php`.

## Configuration

This is the `codepen.php` file in the `config` directory. Go to your [medium settings page](https://medium.com/me/settings),
and generate an access token also known as integration token. Integration tokens do not expire right now, though they may be
revoked by the user at any time.

```php
/**
 *  Config file that a user/developer can insert the self-issued access token
 */
return [
    'integrationToken' => ''
];
```

## Usage

##### MediumManager

This is the class of most interest. It is bound to the ioc container as `'laravel-medium'` and can be accessed using the `Facades\Medium` facade.

##### Facades\Codepen

This facade will dynamically pass static method calls to the `'laravel-codepen'` object in the ioc container which by default is the `CodepenManager` class.

##### Examples

Here you can see an example of just how simple this package is to use.

```php
use Unicodeveloper\Medium\Facades\Medium;
// or you can alias this in config/app.php like I mentioned initially above

Medium::me()->id;
// returns the id of the medium user that can be used for future requests e.g 13889cdb2bb57e75ab7d7261f1f0c4df0e824b3f2249f55b788c0dc2ae84c6b8f

Medium::me()->username;
// returns the username of the medium user e.g prosper

Medium::me()->name;
// returns the full name of the medium user e.g Testing Tester

Medium::me()->url;
// returns the url of the medium profile e.g  "https://medium.com/@prosper"

Medium::me()->imageUrl;
// returns the url of the medium user avatar
```


# WIP - PLEASE DON'T USE IN PRODUCTION YET!!!

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

You can run the tests with:

```bash
vendor/bin/phpunit run
```

Alternatively, you can run the tests like so:

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Prosper Otemuyiwa](https://twitter.com/unicodeveloper)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Security

If you discover any security related issues, please email [prosperotemuyiwa@gmail.com](prosperotemuyiwa@gmail.com) instead of using the issue tracker.