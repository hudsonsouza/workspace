<?php

return array(
    
    // CONTROLE DAS ROTAS - URL
    'router' => array(
        'routes' => array(
            'market' => array(  // NOME DA URL
                'type' => 'Literal',  // CAMINHO FIXO  / NÁO É DINAMICO
                'options' => array(
                    'route'    => '/market',  // CAMINHO DA URL
                    'defaults' => array(
                        //'controller' => 'Market\Controller\Index',
                        'controller' => 'market-index-controller',
                        'action'     => 'index',
                    ),
                ),
                
                // DEIXA A ROTA DINAMICA
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
  
            ),
        ),
    ),
    
    
    // SM - REGISTRO DO SERVICO
    'controllers' => array(
        'invokables' => array(  // TIPO DO SERVICO
            // NOME DO SERVICO        /  CAMINHO DA CLASSE
            //'Market\Controller\Index' => 'Market\Controller\IndexController',  // SERVICO / URL DA CLASSE
            
            // MUDAR O NOME DO REGISTRO DO CONTROLLER PARA SER ACESSADO PELA URL EXPECÍFICA
            'market-index-controller' => 'Market\Controller\IndexController',  // SERVICO / URL DA CLASSE
            // REGISTRO DA 'viewController' M6Ex1 - parte A
            'market-view-controller' => 'Market\Controller\ViewController',
            ),
        
        // REGISTRO DA 'viewController' M6Ex1 - parte B
        'factories' => array(
           'market-post-controller' => 'Market\Factory\PostControllerFactory',
        ),
        // M6Ex1  - PARTE D - CRIAR APELIDO PARA URL
        'aliases' => array(
           'alt' => 'market-view-controller', 
        ),
        
    ),
    
    
    // VIEW MANAGER
        'view_manager' => array(
//        'display_not_found_reason' => true,
//        'display_exceptions'       => true,
//        'doctype'                  => 'HTML5',
//        'not_found_template'       => 'error/404',
//        'exception_template'       => 'error/index',
//        'template_map' => array(
//            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
//            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
//            'error/404'               => __DIR__ . '/../view/error/404.phtml',
//            'error/index'             => __DIR__ . '/../view/error/index.phtml',
//        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    
);