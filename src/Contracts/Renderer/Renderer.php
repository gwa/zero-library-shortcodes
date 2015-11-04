<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts\Renderer;

interface Renderer
{
    /**
     * Add data.
     *
     * @param RendererDataContract $renderdata
     */
    public function setRendererData(RendererData $renderdata);

    /**
     * @param  string $element
     * @param  string|null $data
     *
     * @return string
     */
    public function renderElement($element, $data = null);

    /**
     * Render html.
     *
     * @return mixed
     */
    public function render();
}
