<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes;

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts\Renderer\Renderer as RendererContract;
use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts\Renderer\RendererData as RendererDataContract;

abstract class Renderer implements RendererContract
{
    /**
     * @var RendererDataContract
     */
    protected $renderdata;

    /**
     * @param RendererDataContract $renderdata
     */
    public function setRendererData(RendererDataContract $renderdata)
    {
        $this->renderdata = $renderdata;

        return $this;
    }

    /**
     * @param string      $template
     * @param string|null $data
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
     * Render html.
     *
     * @return mixed
     */
    abstract public function render();

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
    protected function getAttributeHTML($attr)
    {
        $data = $this->get($attr);
        return $data ? 'data-' . $attr . '="' . $data . '"' : '';
    }
}
