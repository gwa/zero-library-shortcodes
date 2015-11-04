<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes;

use Gwa\Wordpress\MockeryWpBridge\Traits\WpBridgeTrait;
use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts\Shortcode as ShortcodeContract;

abstract class Shortcode implements ShortcodeContract
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

    /**
     * Render shortcode.
     *
     * @param array $atts
     * @param string $content
     *
     * @return string
     */
    abstract public function render($atts, $content = '');
}
