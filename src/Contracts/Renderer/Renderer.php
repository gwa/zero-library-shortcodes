<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts\Renderer;

interface Renderer
{
    /**
     * Render shortcode.
     *
     * @param array $atts
     * @param string $content
     *
     * @return string
     */
    public function render($atts, $content = '');

    /**
     * @param  string $element
     * @param  string|null $data
     *
     * @return string
     */
    public function renderElement($element, $data = null);
}
