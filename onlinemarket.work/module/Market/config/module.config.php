<?php

/*
### CONTROLE DE ROTAS - M7Ex1
routes(
    home()
        market(
            view(
                main()
                item()
            )
            post()
        )
)
*/

 return array(
    
     // CONTROLE DAS ROTAS - URL
     
    'router' => array(  // ROUTER
          
        'routes' => array(  // ROUTES
     
            
            // M7Ex1 - PARTE A
            'home' => array(  // ROTA 0
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action' => 'index',
                    ),
                ),
            ), // fim ROTA 0
            
            
             // M7Ex1 - PARTE B
            'market' => array( // ROTA 1 - PAI
                'type' => 'Literal',
                'options' => array(
                    'route' => '/market',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action' => 'index',
                    ),
                ),
             
           
                'may_terminate' => true,
                'child_routes' => array(  // FILHA 1
                    
                // VIEW
                'view' => array(  // FILHA 1.1
                    'type' => 'Literal',
                    'options' => array(
                        'route' => '/view',
                        'defaults' => array(
                            'controller' => 'market-view-controller',
                            'action' => 'index',
                        ),
                    ),                    
                  
                    'may_terminate' => true,
                    'child_routes' => array(  // FILHA 2
                    
                        // MAIN
                        'main' => array(
                            'type'    => 'Segment',
                            'options' => array(
                                //'route'    => '/[:controller[/:action]]',
                                'route'    => '/main[/:category]',
                                //  'constraints' => array(
                                //  'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                //  'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                //  ),
                                'defaults' => array(
                                    'action' => 'index',
                                ),
                            ),
                        ),

                        
                        // ITEM
                        'item' => array(
                            'type'    => 'Segment',
                            'options' => array(
                                'route'    => '/item[/:itemId]',
                                'defaults' => array(
                                    'action' => 'item',
                                ),
                                'constraints' => array(
                                    'itemId' => '[0-9]*',
                                ),                            
                            ),
                        ),                         
   
                    ),  // fim FILHA 2
                    
                ),  // fim FILHA 1.1    
                    
                    
                // POST
                // M7Ex1 - PARTE C
                'post' => array(  // FILHA 1.2
                     'type' => 'Literal',
                     'options' => array(
                         'route' => '/post',
                         'defaults' => array(
                             'controller' => 'market-post-controller',
                             'action' => 'index',
                         ),
                     ),
                 ),  // fim FILHA 1.2                
    
                ), // fim FILHA 1
                 
            ),  // fim ROTA 1 - PAI      
    
        ), // fim ROUTES
     
    ),  // fim ROTER
    
     
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
     
     // REGISTRO DA 'viewController' M9Ex1 - parte A     
     'service_manager' => array(
         'factories' => array(
             'market-post-form' => 'Market\Factory\PostFormFactory',
             // M9Ex1 - parte C - REGISTRO
             'market-post-filter' => 'Market\Factory\PostFilterFactory'
         )
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