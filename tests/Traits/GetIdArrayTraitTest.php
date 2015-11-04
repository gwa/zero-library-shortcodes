<?php
namespace Gwa\Wordpress\Template\Zero\Library\Shortcodes\Tests;

use Gwa\Wordpress\Template\Zero\Library\Shortcodes\Traits\GetIdsArrayTrait;

class GetIdArrayTraitTest extends \PHPUnit_Framework_TestCase
{
    use GetIdsArrayTrait;

    public function testGetIdsArray()
    {
        $idString = '12,2222,3,1';
        $ids      = $this->getIdsArray($idString);
        $exepted  = ['12', '2222', '3', '1'];

        $this->assertEquals($exepted, $ids);
        $this->assertInternalType('array', $ids);
    }
}
