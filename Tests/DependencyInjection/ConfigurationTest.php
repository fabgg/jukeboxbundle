<?php

/**
 * Created by Timothy BOURGAULT
 */

namespace Fabgg\JukeboxBundle\Tests\DependencyInjection;

use Fabgg\JukeboxBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testConfigBuilder(){
        $configBuilder = new Configuration();
        $result = $configBuilder->getConfigTreeBuilder();

        $this->assertInstanceOf(TreeBuilder::class, $result);
    }
}
