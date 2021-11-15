# Laravel-Ami

[![Latest Stable Version](http://poser.pugx.org/soap/laravel-ami/v)](https://packagist.org/packages/soap/laravel-ami)
[![Latest Unstable Version](http://poser.pugx.org/soap/laravel-ami/v/unstable)](https://packagist.org/packages/soap/laravel-ami)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/soap/laravel-ami/run-tests?label=tests)](https://github.com/soap/laravel-ami/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/soap/laravel-ami/Check%20&%20fix%20styling?label=code%20style)](https://github.com/soap/laravel-ami/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](http://poser.pugx.org/soap/laravel-ami/downloads)](https://packagist.org/packages/soap/laravel-ami)
---

Laravel-Ami provides Asterisk interface for laravel via Asterisk Manager Interface.

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
    'connections' => [
        'default' => [
            'uri' => 'user:secret@host:port',
        ]
    ]
];
```

## Usage

Atisan Command 
```php
php artisan ami:cli "pjsip show aors"

```
Above cli command use default uri provided in app/config/ami.php. You can override it with --uri user:secret@host:port.

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
