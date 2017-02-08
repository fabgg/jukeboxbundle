<?php

/**
 * Created by Timothy BOURGAULT
 */

namespace Fabgg\JukeboxBundle\Tests\JukeboxBundle\Lib;



use Fabgg\JukeboxBundle\Lib\JukeboxUtils;

class JukeboxUtilsTest extends \PHPUnit_Framework_TestCase
{
    protected $fileName = 'Sa\'mple.txt';

    public function testSlugify(){
        $slugTest = new JukeboxUtils();
        $result = $slugTest->slugify($this->fileName);

        $this->assertEquals('sa-mple.txt', $result);
    }

}
