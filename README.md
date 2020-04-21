# Nova Secret Field
This package provides a custom secret field which can be toggle to see its value.

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