<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Tests;

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Renderer;
use Gwa\Wordpress\Template\Zero\Library\Shortcodes\RendererData;

class RendererTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $renderer = new RendererStub();

        $this->assertSame($renderer->get('cta'), 'test trait');
    }

    public function testRenderElement()
    {
        $renderer = new RendererStub();
        $template = 'There are monkeys in the %s';

        $this->assertSame($renderer->renderElement($template, 'tree'), 'There are monkeys in the tree');
        $this->assertSame($renderer->renderElement($template, ''), '');
        $this->assertSame($renderer->renderElement($template, null), '');
    }

    public function testGetDataAttributes()
    {
        $renderer   = new RendererStub();
        $attributes = $renderer->getDataAttributes(['minheight']);

        $this->assertSame($attributes, 'data-minheight="false"');

    }

    public function testGetAttributeHTML()
    {
        $renderer   = new RendererStub();
        $attributes = $renderer->getAttributeHTML('minheight');

        $this->assertSame($attributes, 'data-minheight="false"');
    }
}

class RendererStub extends Renderer
{
    function __construct()
    {
        $renderData = new RendererDataStub();
        $renderData->set('cta', 'test trait');
        $renderData->set('minheight', 'false');

        $this->setRendererData($renderData);
    }

    public function get($key)
    {
        return parent::get($key);
    }

    public function getDataAttributes(array $keys)
    {
        return parent::getDataAttributes($keys);
    }

    public function getAttributeHTML($attr)
    {
        return parent::getAttributeHTML($attr);
    }

    public function render($atts, $content = '')
    {

    }
}
