<?php
namespace Market;

class Module 
{
    
    // PEGA AS CONFIGURACOES DO 'module.config.php'
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    // CAREGA OS ARQUIVOS DA PARA 'srv'
    public function getAutoloaderConfig()
    {
        return array(
            // 1- AUTOLOAD GERADO MANUALMENTE
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__.'/autoload_classmap.php',
            ),
            
            
            // 2- SE NAO ENCONTRAR, ZF2 BUSCA NO STANDERD
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }    
}