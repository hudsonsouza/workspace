<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        # ZF2-FUNDAMENTOS
        # RESOLUÇÃO M3Ex1 PAGINA 15
        
        # acrescentar no onBootstrap()
        # • Listens For: the " MvcEvent::EVENT_DISPATCH " event
        # • Context: current object
        # • Handler: onDispatch
        # • Priority: 100
        
        // REGISTRANDO EVENTO
        // ESCUTAR UM EVENTO / listens:"dispatch" event
        // SETAR O context: $this
        // METODO QUE VAI SER EXECUTADO, QD O EVENTO FOR DIAPARADO 
        // handler / callback / metodo: onDispatch()
        // prioridade: 100 alta
        
        // $eventManager->attach('dispatch', arrray($this, 'onDispatch'), 100);
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 100);
    }

    public function onDispatch(MvcEvent $e){
        $vm = $e->getViewModel();  // recebo / exibe na tela / vm = ViewModel
        $vm->setVariable('categories', 'CATEGORY LIST');  // (nome_variavel , conteudo_variavel)
    }

    
//    // REGISTRO DO SERVICO    
//    public function getServiceConfig()
//    {
//        return array(
//            'invokables' => array(
//                'ExemploService' => 'Application\Service\ExemploService'
//            )
//        );
//    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
