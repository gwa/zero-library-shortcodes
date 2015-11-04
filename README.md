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
            'btn'   => null,
            'url'   => null,
        ];
    }
}

```

Now we extend the Renderer and add some values for some keys.

``` php

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Renderer;

class CardRenderer extends Renderer
{
    public function render()
    {
        return $this->get('title');
    }
}

```

Last thing now is to create a shortcode class.

``` php

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Shortcode;

class CardShortcode extends Shortcode
{
    public $atts = [
        'title' => ''
    ];

    public function getShortcode()
    {
        return 'card';
    }

    public function render($atts)
    {
        $attr = $this->getWpBridge()->shortcodeAtts($this->atts, $atts);

        return = (new CardRenderer())->setRendererData($this->getData())->render();
    }

    protected function getData()
    {
        $renderdata = new CardData();
        $renderdata->set('content', $this->getContent($id))
            ->set('url', 'http://google.com/')
            ->set('title', 'google');

        return $renderdata;
    }
}

```

Register you plugin.

``` php
use Gwa\Wordpress\MockeryWpBridge\WpBridge;

(new CardShortcode())->setWpBridge(new WpBridge())->init();
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
