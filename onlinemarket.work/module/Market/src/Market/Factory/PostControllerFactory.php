<?php

namespace Market\Factory;

class PostControllerFactory implements \Zend\ServiceManager\FactoryInterface
{
    // METODO OBRIGATORIO
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $controllerManager) 
    {
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        
        $categories = $sm->get('categories');
        
        $postController = new \Market\Controller\PostController();  // INSTANCIA
        $postController->setCategories($categories);
        
        return $postController;
    }
}
