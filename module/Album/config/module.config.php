<?php
namespace Album;

use Zend\Mvc\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Mvc\Router\Http\Segment;
use Album\Controller\AlbumController;
return [


    'router' => [
        'routes' => [
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'home' => [
        'type' => \Zend\Router\Http\Literal::class,
        'options' => [
            'route'    => '/',
            'defaults' => [
                'controller' => AlbumController::class, // <-- change here
                'action'     => 'index',
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];