<?php

/**
 * Created by Timothy BOURGAULT
 */

namespace Fabgg\JukeboxBundle\Tests\JukeboxBundle\Lib;


use Fabgg\JukeboxBundle\Lib\JukeboxManager;
use Fabgg\JukeboxBundle\Tests\JukeboxBundle\Model\JKFileTest;

class JukeboxManagerTest extends \PHPUnit_Framework_TestCase
{
    public function  testGetAbsolutePath(){
        $JKFile = new JKFileTest(123,'Sa\'mple.txt','.txt','text/plain',128,__DIR__.'/../Tests/JukeboxBundle/Lib','sample.txt','02/02/2017',null,true,false);
        $path = __DIR__.'/../var/jukebox';
        $separator = '/';
        $JKManagerTest = new JukeboxManager($path, $separator);
        $result = $JKManagerTest->getAbsolutePath($JKFile);

        $pathRes = '/Users/timothy/Sites/JukeboxV1/tests/JukeboxBundle/Lib/../var/jukebox//Users/timothy/Sites/JukeboxV1/tests/JukeboxBundle/Lib/../Tests/JukeboxBundle/Lib/';
        $this->assertEquals($pathRes, $result);
    }
}
