<?php
namespace Market\Controller;
//use \Zend\Mvc\Controller\AbstractActionController;
//use \Zend\View\Model\ViewModel;

class IndexController extends \Zend\Mvc\Controller\AbstractActionController {
    
    public function indexAction() 
    {
        return new \Zend\View\Model\ViewModel();
    }
}
