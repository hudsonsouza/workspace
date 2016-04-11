<?php
namespace Market\Controller;
//use \Zend\Mvc\Controller\AbstractActionController;
//use \Zend\View\Model\ViewModel;

class IndexController extends \Zend\Mvc\Controller\AbstractActionController {
    
    public function indexAction() 
    {
        $messages = array();
        if($this->flashMessenger()->hasMessages()){
            $messages = $this->flashMessenger()->getMessages();
        }
        
        // M8Ex1 - Parte A
        return array('messages'=>$messages);
        //return new \Zend\View\Model\ViewModel(array('messages'=>$messages));
    }
    
    public function fooAction(){
        return new ViewMofel();
    }
}
