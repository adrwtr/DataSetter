<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(

            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Database\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),

            
            'database' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/database[/:action][/:arquivo]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Database\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),

                    'may_terminate' => false
                ),
            ),

            'processar' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/processar[/:arquivo]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Database\Controller',
                        'controller'    => 'Processar',
                        'action'        => 'processar',
                    ),

                    'may_terminate' => false
                ),
            ),
        ),
    
      
            
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),

    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Database\Controller\Index' => 'Database\Controller\IndexController',
            'Database\Controller\Processar' => 'Database\Controller\ProcessarController'
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'Database/index/index'    => __DIR__ . '/../view/Database/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);

