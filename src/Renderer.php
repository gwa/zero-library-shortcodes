<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes;

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts\Renderer\Renderer as RendererContract;

abstract class Renderer implements RendererContract
{
    /**
     * @var RendererData
     */
    protected $renderdata;

    /**
     * @param RendererData $renderdata
     */
    public function __construct(RendererData $renderdata)
    {
        $this->renderdata = $renderdata;
    }

    /**
     * @param  string $template
     * @param  string|null $data
     *
     * @return string
     */
    public function renderElement($template, $data = null)
    {
        if (is_null($data) || (string) $data === '') {
            return '';
        }

        return sprintf($template, $data);
    }

    /**
     * Render shortcode.
     *
     * @param array $atts
     * @param string $content
     *
     * @return string
     */
    abstract public function render($atts, $content = '');

    /**
     * @param string $key
     *
     * @return mixed
     */
    protected function get($key)
    {
        return $this->renderdata->get($key);
    }

    /**
     * Renders a string of data- attributes for $keys, where data for $key is set.
     *
     * @param array
     *
     * @return string
     */
    protected function getDataAttributes(array $keys)
    {
        $attr = [];

        foreach ($keys as $key) {
            $attr[] = $this->getAttributeHTML($key);
        }

        return trim(implode(' ', array_filter($attr)));
    }

    /**
     * @param string
     *
     * @return string
     */
    private function getAttributeHTML($attr)
    {
        $data = $this->get($attr);
        return $data ? 'data-' . $attr . '="' . $data . '"' : '';
    }
}
