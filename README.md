# Asterisk Manager Interface integration Laravel package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soap/laravel-ami.svg?style=flat-square)](https://packagist.org/packages/soap/laravel-ami)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/soap/laravel-ami/run-tests?label=tests)](https://github.com/soap/laravel-ami/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/soap/laravel-ami/Check%20&%20fix%20styling?label=code%20style)](https://github.com/soap/laravel-ami/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/soap/laravel-ami.svg?style=flat-square)](https://packagist.org/packages/soap/laravel-ami)

---
This repo can be used to scaffold a Laravel package. Follow these steps to get started:

1. Press the "Use template" button at the top of this repo to create a new repo with the contents of this laravel-ami
2. Run "php ./configure.php" to run a script that will replace all placeholders throughout all the files
3. Remove this block of text.
4. Have fun creating your package.
5. If you need help creating a package, consider picking up our <a href="https://laravelpackage.training">Laravel Package Training</a> video course.
---

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require soap/laravel-ami
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="ami-config"
```

Optionally, you can publish the views using


This is the contents of the published config file:

```php
return [

];
```

## Usage

```php
$laravel-ami = new Soap\Ami();

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Prasit Gebsaap](https://github.com/soap)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
