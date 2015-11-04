<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Traits;

/**
 * Trait that adds a method for parsing a comma-separated list of IDs.
 */
trait GetIdsArrayTrait
{
    /**
     * Get ids from string.
     *
     * @param string $ids comma separated ids
     *
     * @return array
     */
    protected function getIdsArray($ids)
    {
        $ret = [];

        foreach (explode(',', $ids) as $id) {
            if ($intvalue = (int) $id) {
                $ret[] = $intvalue;
            }
        }

        return $ret;
    }
}
