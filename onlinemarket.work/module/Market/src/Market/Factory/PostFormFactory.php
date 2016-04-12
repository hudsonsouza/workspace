<?php

namespace Market\Factory;

class PostFormFactory implements \Zend\ServiceManager\FactoryInterface
{
    // METODO OBRIGATORIO
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sm) 
    {
        // INGETAR DEPENDENCIA
        $categories = $sm->get('categories');
        
        // M9Ex1 - Parte A
        $form = new \Market\Form\PostForm(); // INSTANCIA
        $form->setCategories($categories);  // RECEBE AS CATEGORIES
        $form->buildForm();  // EXECUTAR O METODO PARA REGISTRAR  OS ELEMENTOS E CONSTRUIR O FORMULARIO
        
        return $form;
    }
}
