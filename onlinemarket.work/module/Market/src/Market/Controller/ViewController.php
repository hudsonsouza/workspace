<?php

namespace Market\Controller;

class ViewController extends \Zend\Mvc\Controller\AbstractActionController
{
    public function indexAction() {
        return new \Zend\View\Model\ViewModel(array('category'=>'category postings'));
    }
}