<?php
// M6Ex1 - Parte B
namespace Market\Controller;

class PostController extends \Zend\Mvc\Controller\AbstractActionController 
{
    public $categories;
    
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    
    public function indexAction() {
        return new \Zend\View\Model\ViewModel(array('categories'=>$this->categories));
    }
}
