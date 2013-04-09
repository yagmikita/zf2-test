<?php

namespace Blog;

return array(
    'router' => array(
        'routes' => array(
            /*'testConsole' => array(
                'options' => array(
                    'route' => 'get index [--verbose|-v] <doname>',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Blog\Command',
                        'controller' => 'Console',
                        'action' => 'index'
                    ),
                ),
            ),*/
            'blog' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route' => '/blog',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Blog\Controller',
                        'controller'    => 'Post',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'paginator' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/post/index/[page/:page]',
                            'defaults' => array(
                                'page'           => 1
                            ),
                        ),
                    ),
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[/:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Post',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Post' => 'Blog\Controller\PostController',
            'Blog\Controller\User' => 'Blog\Controller\UserController',
            'Blog\Command\Console' => 'Blog\Command\Console',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'template_path_stack' => array(
            'blog' => __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'configuration' => array(
            'orm_default' => array(
                /**
                 * these folder shold be writable - this is default option
                 */
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
            ),
        ),
        'driver' => array(
            'application_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Blog/Entity',
                    __DIR__ . '/../src/Blog/Mapping/Annotations'
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Blog\Entity' => 'application_entities',
                ),
            ),
        ),
    ),
);