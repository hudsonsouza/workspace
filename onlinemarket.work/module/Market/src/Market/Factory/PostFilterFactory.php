<?php

namespace Market\Factory;

class PostFilterFactory implements \Zend\ServiceManager\FactoryInterface
{

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sm) {
        $filter = new \Market\Form\PostFilter();
        $filter->setCategories($sm->get('categories'));
        $filter->buildFilter();  // GERAR TODOS OS CAMPOS AUTOMATICAMENTE
        return $filter;
    }

}
