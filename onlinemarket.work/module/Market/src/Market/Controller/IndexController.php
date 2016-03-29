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
        return new \Zend\View\Model\ViewModel(array('messages'=>$messages));
    }
}
