<?php

namespace Market\Form;

class PostFilter extends \Zend\InputFilter\InputFilter
{

    private $categories;
    
    // SETs / GETs
    public function setCategories($categories){
        $this->categories  = $categories;
    }
    
    // CRIAR OS ELEMENTOS DE FILTROS
    public function buildFilter()
    {
        // CRIAR DIVERSOS INPUTs PARA ADD FILTORS
        $category = new \Zend\InputFilter\Input('category');
        $category->getFilterChain()
                 ->attachByName('StringTrim')  // TIRA ESPACO EM BRANCO
                 ->attachByname('StripTags')  // RETIRA QLQ CARACTER ESPECIAL
                 ->attachByName('StringToLower')  // CONVERTE PARA MINUSCULO
        ;
        
        $category->getValidatorChain()  // ITEM DE SEGURANCA
                 ->attachByName('InArray', array('haystack'=>$this->categories) );  // OBRIGA OS DADOS A SEREM PASSADO POR ARRAY, PARA SEREM VALIDADOS
         
        
        $title = new \Zend\InputFilter\Input('title');
        $title->getFilterChain()
              ->attachByName('StringTrim')
              ->attachByName('StripTags')
        ;
        
        $titleRegex = new \Zend\Validator\Regex(array('pattern'=>'/^[a-zA-Z0-9 ]*$/'));
        $titleRegex->setMessage('Title should only contein: numbers, letters or spaces!');
                        
        $title->getValidatorChain()
              ->attach($titleRegex)
              ->attachByName('Stringlength', array('min'=>1, 'max'=>128))
        ;
        
        // INSERIR DENTRO DO 'InputFilter'
        $this->add($category)
             ->add($title)
        ;
        
    }
    
}
