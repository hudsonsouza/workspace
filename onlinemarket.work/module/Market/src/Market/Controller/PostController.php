<?php
// M6Ex1 - Parte B
namespace Market\Controller;

class PostController extends \Zend\Mvc\Controller\AbstractActionController 
{
    public $categories;
    
    // ----------------
    // M9Ex1 - Parte B
    private $postForm;
    
    public function setPostForm($postForm)
    {
        $this->postForm  = $postForm;
    }
    // ----------------
    
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    
    public function indexAction() {
        
        // M9Ex1 - Parte A
        $data = $this->params()->fromPost();
        $this->postForm->setData($data);
        $viewModel = new \Zend\View\Model\ViewModel(array('postForm'=>$this->postForm, 'data'=>$data));
        
        // M8Ex1 - Parte B
        // $viewModel = new \Zend\View\Model\ViewModel(array('categories'=>$this->categories));
        // PASSA O TEMPLAT MANUALMENTE
        // $viewModel->setTemplate("market/post/invalid.phtml");
        
        return $viewModel;
        //return new \Zend\View\Model\ViewModel(array('categories'=>$this->categories));
    }
}
