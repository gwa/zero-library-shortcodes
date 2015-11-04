# zero-library-shortcodes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gwa/zero-library-shortcodes.svg?style=flat-square)](https://packagist.org/packages/gwa/zero-library-shortcodes)
[![Total Downloads](https://img.shields.io/packagist/dt/gwa/zero-library-shortcodes.svg?style=flat-square)](https://packagist.org/packages/gwa/zero-library-shortcodes)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

## Master

[![Build Status](https://img.shields.io/travis/gwa/zero-library-shortcodes/master.svg?style=flat-square)](https://travis-ci.org/gwa/zero-library-shortcodes)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/gwa/zero-library-shortcodes.svg?style=flat-square)](https://scrutinizer-ci.com/g/gwa/zero-library-shortcodes/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/gwa/zero-library-shortcodes.svg?style=flat-square)](https://scrutinizer-ci.com/g/gwa/zero-library-shortcodes)

## Develop

[![Build Status](https://img.shields.io/travis/gwa/zero-library-shortcodes/master.svg?style=flat-square)](https://travis-ci.org/gwa/zero-library-shortcodes)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/gwa/zero-library-shortcodes.svg?style=flat-square)](https://scrutinizer-ci.com/g/gwa/zero-library-shortcodes/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/gwa/zero-library-shortcodes.svg?style=flat-square)](https://scrutinizer-ci.com/g/gwa/zero-library-shortcodes)

## Install

Via Composer

``` bash
$ composer require gwa/zero-library-shortcodes
```

## Usage

First you need to extend RendererData and create a getDefaults function.

``` php

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\RendererData;

class CardData extends RendererData
{
    public function getDefaults()
    {
        return [
            'title' => null,
        ];
    }
}

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Great White Ark](https://github.com/gwa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
