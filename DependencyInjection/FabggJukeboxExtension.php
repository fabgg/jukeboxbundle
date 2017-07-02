<?php

namespace Fabgg\JukeboxBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class FabggJukeboxExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

      //  var_dump($config);die();

        $container->setParameter('fabgg_jukebox.system.path.public', $config['system']['path']['public']);
        $container->setParameter('fabgg_jukebox.system.path.private', $config['system']['path']['private']);
        $container->setParameter('fabgg_jukebox.system.separator', $config['system']['separator']);
        $container->setParameter('fabgg_jukebox.public_uri_prefix', $config['public_uri_prefix']);

       // $container->setAlias('tbl_jukebox.system.path', $config['system']['path']);
    }
}
