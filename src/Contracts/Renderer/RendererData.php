<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts\Renderer;

interface RendererData
{
    /**
     * @return array
     */
    public function getDefaults();

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @throws \InvalidArgumentException
     */
    public function set($key, $value);

    /**
     *
     * @param  string $key
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function get($key);
}
