# This is my package global-settings

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oscarpasache/global-settings.svg?style=flat-square)](https://packagist.org/packages/oscarpasache/global-settings)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/oscarpasache/global-settings/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/oscarpasache/global-settings/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/oscarpasache/global-settings/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/oscarpasache/global-settings/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oscarpasache/global-settings.svg?style=flat-square)](https://packagist.org/packages/oscarpasache/global-settings)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require oscarpasache/global-settings
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="global-settings-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="global-settings-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
\OscarPasache\GlobalSettings::set("sitename", "Global Settings");
echo \OscarPasache\GlobalSettings::get("sitename");
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oscar Pasache](https://github.com/oscarpasache)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
