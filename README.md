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

## Usage

##### CodepenManager

This is the class of most interest. It is bound to the ioc container as `'laravel-codepen'` and can be accessed using the `Facades\Codepen` facade.

##### Facades\Codepen

This facade will dynamically pass static method calls to the `'laravel-codepen'` object in the ioc container which by default is the `CodepenManager` class.

##### Examples

Here you can see an example of just how simple this package is to use.

```php
use Unicodeveloper\Codepen\Facades\Codepen;
// or you can alias this in config/app.php like I mentioned initially above

Codepen::getMostPopularPens();
// returns an array containing 12 results of the most popular codepens

Codepen::getLatestPickedPens();
// returns an array containing 12 results of the latest picked codepens

Codepen::getRecentlyCreatedPens();
// returns an array containing 12 results of the most recently created codepens

Codepen::getProfile($username);
// returns an object containing the profile of a user . e.g $username is chriscoyier
{#169 ▼
  +"nicename": "Chris Coyier"
  +"username": "chriscoyier"
  +"avatar": "//s3-us-west-2.amazonaws.com/s.cdpn.io/3/profile/profile-512_22.jpg"
  +"location": "Milwaukee, WI"
  +"bio": "I'm kinda into this whole CodePen thing."
  +"pro": true
  +"followers": "6399"
  +"following": "1165"
  +"links": array:3 [▶]
}

Codepen::user('chriscoyier')->location;
// returns Milwaukee, WI

Codepen::user('chriscoyier')->nicename;
// returns Chris Coyier

Codepen::user('chriscoyier')->username;
// returns chriscoyier

Codepen::user('chriscoyier')->avatar;
// returns //s3-us-west-2.amazonaws.com/s.cdpn.io/3/profile/profile-512_22.jpg

Codepen::user('chriscoyier')->bio;
// returns I'm kinda into this whole CodePen thing.

Codepen::user('chriscoyier')->followers;
// returns 6399

Codepen::user('chriscoyier')->following;
// returns 1165

Codepen::getLovedPosts($username);
//  e.g sample $username is chriscoyier, returns an array of his most loved posts

Codepen::getPopularPosts($username);
// e.g sample $username is chriscoyier, returns an array of his most popular posts

Codepen::getPublishedPosts($username);
// e.g sample $username is chriscoyier, returns an array of his most published posts

Codepen::getLovedPens($username);
// e.g sample $username is chriscoyier, returns an array of his most loved pens

Codepen::getPopularPens($username);
// e.g sample $username is chriscoyier, returns an array of his most popular pens

Codepen::getPublicPens($username);
// e.g sample $username is chriscoyier, returns an array of his public pens

Codepen::getForkedPens($username);
// e.g sample $username is chriscoyier, returns an array of his most forked pens
```

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