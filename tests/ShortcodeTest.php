<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Tests;

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Shortcode;

class ShortcodeTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTextDomain()
    {
        $shortcode = new ShortcodeStub();
        $shortcode->setTextDomain('test');

        $this->assertSame($shortcode->getTextDomain(), 'test');
    }
}

class ShortcodeStub extends Shortcode
{
    public function getShortcode()
    {
        return 'test';
    }

    public function render($atts, $content = '')
    {
        # code...
    }
}
