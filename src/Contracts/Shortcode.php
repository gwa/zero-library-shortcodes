<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts;

interface Shortcode
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
     * Get shortcode name.
     *
     * @return string
     */
    public function getShortcode();

    /**
     * @param string $domain
     */
    public function setTextDomain($domain);

    /**
     * @return string
     */
    public function getTextDomain();
}
