# Select2 for Livewire components

[![josedaian/select2wire](https://img.shields.io/static/v1?label=Packagist&message=josedaian/select2wire&color=blue&logo=packagist&logoColor=white)](https://packagist.org/packages/josedaian/select2wire)
[![Laravel 10](https://img.shields.io/badge/Laravel-10-orange.svg)](http://laravel.com)
[![Latest Stable Version](https://img.shields.io/packagist/v/josedaian/select2wire.svg)](https://packagist.org/packages/josedaian/select2wire)
[![Total Downloads](https://poser.pugx.org/josedaian/select2wire/downloads.png)](https://packagist.org/packages/josedaian/select2wire)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/josedaian/select2wire)
[![Livewire](https://img.shields.io/static/v1?label=Livewire&message=3.0&color=fb70a9&style=flat-square)](https://laravel-livewire.com)

Laravel package for handling Select2 inputs for Livewire components.

## Requirements
- [PHP >= 8.1](http://php.net/)
- [Laravel Framework >= 10](https://github.com/laravel/framework)
- [Select2](https://select2.org)
- [jQuery](https://jquery.com/)
- [Livewire >= 3](https://laravel-livewire.com)

## Quick Installation

```bash
composer require josedaian/select2wire
```
For Livewire 2.x version, go here: [select2wire v1.x](https://github.com/josedaian/select2wire/tree/1.x)

## Usage
Add the following line within your blade view, below the select2.js and jquery.js scripts

```blade
@select2wireScript
```

Within your Livewire component class, call the trait to do one of the functions when loading the component.

```php
use Livewire\Component;
use JoseDaian\Select2\Traits\HasSelect2Wire;

class ExampleComponent extends Component
{
    use HasSelect2Wire;
}
```

If you don’t have a custom init event, you can call the `initSelect2` event directly within your component view.
```blade
<div wire:init="initSelect2">
    ...
    <!-- All your selects here -->
</div>
```

Or in case you already have an init event inside your component, just add the following line
```php
public function customInitFunction()
{
    // your code
    $this->initSelect2();
}
```

And within your blade view, you’ll need to add the `data-select2wire="select2"` attribute to your inputs select.
```html
<select data-select2wire="select2">
    <!-- options -->
</select>
```

## Contributing

Please see [CONTRIBUTING](https://github.com/josedaian/select2wire/blob/master/.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [josedaian.cabrera@gmail.com](mailto:josedaian.cabrera@gmail.com) instead of using the issue tracker.

## Credits

- [Jose Daian](https://github.com/josedaian)

## Acknowledgments

This package was inspired by [livewire-select2](https://github.com/Pharaonic/livewire-select2).


## License

The MIT License (MIT). Please see [License File](https://github.com/josedaian/select2wire/LICENSE) for more information.
