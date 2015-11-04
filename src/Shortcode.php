<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes;

use Gwa\Wordpress\MockeryWpBridge\Traits\WpBridgeTrait;

abstract class Shortcode extends Renderer
{
    use WpBridgeTrait;

    protected $textdomain;

    public function setTextDomain($domain)
    {
        $this->textdomain = $domain;

        return $this;
    }

    public function getTextDomain()
    {
        return $this->textdomain;
    }

    public function init()
    {
        $this->getWpBridge()->addShortcode($this->getShortcode(), [$this, 'render']);
    }

    /**
     * Get shortcode name.
     *
     * @return string
     */
    abstract public function getShortcode();
}
