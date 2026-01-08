# Laravel USPS Addresses

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chrishardie/laravel-usps-addresses.svg?style=flat-square)](https://packagist.org/packages/chrishardie/laravel-usps-addresses)
[![Total Downloads](https://img.shields.io/packagist/dt/chrishardie/laravel-usps-addresses.svg?style=flat-square)](https://packagist.org/packages/chrishardie/laravel-usps-addresses)

Laravel package that provides a simple facade to the USPS Addresses API

## Installation

You can install the package via composer:

```bash
composer require chrishardie/laravel-usps-addresses
```

Define required variables in `.env`, available from your app's configuration in the [USPS Developers Dashboard](https://developers.usps.com/):

```bash
USPS_CLIENT_ID=
USPS_CLIENT_SECRET=
```

You can optionally publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-usps-addresses-config"
```

This is the contents of the published config file:

```php
return [
    'base_url' => env('USPS_ADDRESSES_BASE_URL', 'https://apis.usps.com/addresses/v3'),

    'oauth' => [
        'token_url' => env('USPS_OAUTH_TOKEN_URL', 'https://apis.usps.com/oauth2/v3/token'),
        'client_id' => env('USPS_CLIENT_ID'),
        'client_secret' => env('USPS_CLIENT_SECRET'),
        'scope' => 'addresses',
    ],

    'timeout' => 10,
];
```

## Usage

```php
use UspsAddress;

$result = UspsAddress::verify([
    'streetAddress' => '1600 Pennsylvania Ave NW',
    'city' => 'Washington',
    'state' => 'DC',
]);

$result->isValid();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Chris Hardie](https://github.com/ChrisHardie)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
