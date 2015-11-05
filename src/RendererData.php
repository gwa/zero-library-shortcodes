<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes;

use InvalidArgumentException;
use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Contracts\Renderer\RendererData as RendererDataContract;

abstract class RendererData implements RendererDataContract
{
    /**
     * @var array
     */
    protected $data = [];

    public function __construct()
    {
        $this->data = $this->getDefaults();
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @throws \InvalidArgumentException
     */
    public function set($key, $value)
    {
        if (method_exists($this, 'validate' . ucfirst($key))) {
            $value = call_user_func([$this, 'validate' . ucfirst($key)], $value);
        }

        $this->checkKeyExistInDefault($key);

        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param  string $key
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function get($key)
    {
        if (!array_key_exists($key, $this->getAllData())) {
            throw new InvalidArgumentException(sprintf('Key[%s] dont exists.', $key));
        }

        return $this->getAllData()[$key];
    }

    /**
     * Get all saved data.
     *
     * @return array
     */
    public function getAllData()
    {
        return $this->data;
    }

    /**
     * @return  array
     */
    abstract public function getDefaults();

    /**
     * @param  string $key
     *
     * @throws \InvalidArgumentException
     */
    protected function checkKeyExistInDefault($key)
    {
        if (!array_key_exists($key, $this->getDefaults())) {
            throw new InvalidArgumentException(sprintf('Key[%s] dont exists in defaults array.', $key));
        }
    }
}
