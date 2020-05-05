# Nova Secret Field
This package provides a custom secret field which can be toggled to see its value.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nalingia/nova-secret-field)](https://packagist.org/packages/nalingia/nova-secret-field)
![License](https://img.shields.io/github/license/nalingia/nova-secret-field)

## Installation

```shell
composer require nalingia/nova-secret-field
```

## Usage

```php
use Nalingia\NovaSecretField\NovaSecretField;

//...

public function fields()
{
    return [
        NovaSecretField::make('Name'),
    ];
}
```

## Customise

The field ships with a copy-to-clipboard feature. By default, this feature is disabled but if you want to enable it, use `canCopyToClipboard` method on your instance.

```php
use Nalingia\NovaSecretField\NovaSecretField;

//...

public function fields()
{
    return [
        NovaSecretField::make('Name')
            ->canCopyToClipboard(),
    ];
}
```