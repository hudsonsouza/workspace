<?php
 
 namespace Market\Controller;
 
 class ViewController extends \Zend\Mvc\Controller\AbstractActionController
 {
     public function indexAction() {
         // PARTE B
         //return new \Zend\View\Model\ViewModel(array('category'=>'category postings'));
         
         // PARTE C
         //$category  = $this->params()->fromQuery("category");
         
         //M7Ex1 - Parte D
         $category  = $this->params()->fromRoute("category");
         
         return new \Zend\View\Model\ViewModel(array('category'=>$category));  
     }
     
     public function itemAction()
     {
         // M6Ex1 - Parte C
         //$itemId = $this->params()->fromQuery('itemId');
         
         //M7Ex1 - Parte D
         $itemId = $this->params()->fromRoute('itemId');
         
         
         
         // REDIRECIONA PARA PAGINA 'home' CASO itemId ESTAJA EM BRANCO
         if(!$itemId){
             $this->flashMessenger()->addMessage("Item not found");
             //return $this->redirect()->toRoute('home');
             return $this->redirect()->toRoute('market');
         }
         
         return new \Zend\View\Model\ViewModel(array('itemId'=>$itemId));
     }
            
 }