<?php

namespace Fabgg\JukeboxBundle;


//use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
//use Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass;
//use Doctrine\Bundle\CouchDBBundle\DependencyInjection\Compiler\DoctrineCouchDBMappingsPass;
//use Doctrine\Bundle\PHPCRBundle\DependencyInjection\Compiler\DoctrinePhpcrMappingsPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class FabggJukeboxBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
       // $container->addCompilerPass(new TransformerCompilerPass());
    }
//    private function addRegisterMappingsPass(ContainerBuilder $container)
//    {
//        $mappings = array(
//            realpath(__DIR__ . '/Resources/config/doctrine-mapping') => 'Tbl\JukeboxBundle\Model',
//        );
//
//        if (class_exists('Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass')) {
//            $container->addCompilerPass(
//                DoctrineOrmMappingsPass::createXmlMappingDriver(
//                    $mappings,
//                    array('tbl_jukebox.model_manager_name'),
//                    'tbl_jukebox.backend_type_orm',
//                    array('TblJukeboxBundle' => 'Tbl\JukeboxBundle\Model')
//                ));
//        }
//
//        if (class_exists('Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass')) {
//            $container->addCompilerPass(DoctrineMongoDBMappingsPass::createXmlMappingDriver($mappings, array('fos_user.model_manager_name'), 'fos_user.backend_type_mongodb'));
//        }
//
//        if (class_exists('Doctrine\Bundle\CouchDBBundle\DependencyInjection\Compiler\DoctrineCouchDBMappingsPass')) {
//            $container->addCompilerPass(DoctrineCouchDBMappingsPass::createXmlMappingDriver($mappings, array('fos_user.model_manager_name'), 'fos_user.backend_type_couchdb'));
//        }
//    }
//    public function build(ContainerBuilder $container)
//    {
//        parent::build($container);
//        // ...
//
//        $modelDir = realpath(__DIR__.'/Resources/config/doctrine/model');
//        $mappings = array(
//            $modelDir => 'Symfony\Cmf\RoutingBundle\Model',
//        );
//
//        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';
//        if (class_exists($ormCompilerClass)) {
//            $container->addCompilerPass(
//                DoctrineOrmMappingsPass::createXmlMappingDriver(
//                    $mappings,
//                    array('cmf_routing.model_manager_name'),
//                    'cmf_routing.backend_type_orm',
//                    array('CmfRoutingBundle' => 'Symfony\Cmf\RoutingBundle\Model')
//                ));
//        }
//
//        $mongoCompilerClass = 'Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass';
//        if (class_exists($mongoCompilerClass)) {
//            $container->addCompilerPass(
//                DoctrineMongoDBMappingsPass::createXmlMappingDriver(
//                    $mappings,
//                    array('cmf_routing.model_manager_name'),
//                    'cmf_routing.backend_type_mongodb',
//                    array('CmfRoutingBundle' => 'Symfony\Cmf\RoutingBundle\Model')
//                ));
//        }
//
//        $couchCompilerClass = 'Doctrine\Bundle\CouchDBBundle\DependencyInjection\Compiler\DoctrineCouchDBMappingsPass';
//        if (class_exists($couchCompilerClass)) {
//            $container->addCompilerPass(
//                DoctrineCouchDBMappingsPass::createXmlMappingDriver(
//                    $mappings,
//                    array('cmf_routing.model_manager_name'),
//                    'cmf_routing.backend_type_couchdb',
//                    array('CmfRoutingBundle' => 'Symfony\Cmf\RoutingBundle\Model')
//                ));
//        }
//
//        $phpcrCompilerClass = 'Doctrine\Bundle\PHPCRBundle\DependencyInjection\Compiler\DoctrinePhpcrMappingsPass';
//        if (class_exists($phpcrCompilerClass)) {
//            $container->addCompilerPass(
//                DoctrinePhpcrMappingsPass::createXmlMappingDriver(
//                    $mappings,
//                    array('cmf_routing.model_manager_name'),
//                    'cmf_routing.backend_type_phpcr',
//                    array('CmfRoutingBundle' => 'Symfony\Cmf\RoutingBundle\Model')
//                ));
//        }
//    }
}
