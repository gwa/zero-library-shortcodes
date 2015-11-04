<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Tests;

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\RendererData;

class RendererDataTest extends \PHPUnit_Framework_TestCase
{
    public function testTraitGetDefaultValue()
    {
        $renderData = new RendererDataStub();

        $this->assertEquals('headline', $renderData->get('h3'));
    }

    public function testTraitValidateSetValue()
    {
        $renderData = new RendererDataStub();

        $renderData->set('h3', 'test trait');

        $this->assertSame($renderData->get('h3'), 'TEST TRAIT');
    }

    public function testTraitSetWithSetDefaultKey()
    {
        $renderData = new RendererDataStub();
        $renderData->set('cta', 'test trait');

        $this->assertSame($renderData->get('cta'), 'test trait');
    }

    public function testTraitSetWithoutSetDefaultKey()
    {
        $this->setExpectedException('\InvalidArgumentException');

        $renderData = new RendererDataStub();
        $renderData->set('h1', 'test trait');
    }

    public function testTraitGetIfKeyDontExist()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $renderData = new RendererDataStub();
        $renderData->get('h2');
    }
}

class RendererDataStub extends RendererData
{
    protected function validateH3($string)
    {
        return strtoupper($string);
    }

    public function getDefaults()
    {
        return [
            'h3' => 'headline',
            'cta' => 'foobar',
            'details' => null,
            'minheight' => true,
        ];
    }
}
