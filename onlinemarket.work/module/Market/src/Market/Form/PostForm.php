<?php

namespace Market\Form;

class PostForm extends \Zend\Form\Form
{
    
    // ### M9Ex1 - Parte A
    
    // ATRIBUTO PRIVADO
    private $categories;
    
    
    // GETs & SETs
    //    public function getCategories()
    //    {
    //        return $this->categories;
    //    }
    
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    
    
    // FAZER A CRIAÇÃO DO FORMULARIO
    public function buildForm()
    {
        // ELEMENTOS
        $this->setAttribute("method", "POST");
        
        $category = new \Zend\Form\Element\Select('category');
        $category->setLabel("Category")
                 ->setValueOptions(
                        array_combine($this->categories, $this->categories)
                   )
        ;
        
        $title = new \Zend\Form\Element\Text('title');
        $title->setLabel("Title")
              ->setAttributes(array('size'=>25, 'maxLength'=>128))
        ;
        
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setAttribute('value', 'Post');
        
        // ADICIONAR ELEMENTOS AO FORM
        $this->add($category)
             ->add($title)
             ->add($submit)
        ;
    }
  
}
