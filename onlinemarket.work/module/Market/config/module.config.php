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
                        'controller' => 'Market\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    
    // SM - REGISTRO DO SERVICO
    'controllers' => array(
        'invokables' => array(  // TIPO DO SERVICO
            // NOME DO SERVICO        /  CAMINHO DA CLASSE
            'Market\Controller\Index' => 'Market\Controller\IndexController',  // SERVICO / URL DA CLASSE
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