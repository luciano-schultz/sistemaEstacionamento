<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

return array(
    'router' => ['routes' => ['home-sec' => ['type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => ['route' => '/',
                    'defaults' => ['controller' => 'Admin\Controller\Index',
                        'action' => 'index',
                    ],
                ],
            ],
            'full-app' => ['type' => 'Segment',
                'options' => ['route' => '/admin[/:controller]/:action[[/id]/:id]'
                    . '[/turma/:turma][/curso/:curso][/page/:page][/msg/:msg]',
                    'constraints' => ['controller' => '[a-zA-Z_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                        'turma' => '[0-9]+',
                        'page' => '[0-9]+',
                        'msg' => '[0-9]+',
                    ],
                    'defaults' => ['__NAMESPACE__' => 'Admin\Controller',
                        'controller' => 'index',
                        'action' => 'index',
                    ],
                ],
            ],
            'full-app2' => ['type' => 'Segment',
                'options' => ['route' => '/admin[/:controller][/:action][[/id]/:id][/page/:page]',
                    'constraints' => ['controller' => '[a-zA-Z_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                        'page' => '[0-9]+',
                    ],
                    'defaults' => ['__NAMESPACE__' => 'Admin\Controller',
                        'controller' => 'index',
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
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
            'Admin\Controller\Index' => Controller\IndexController::class,
            'Admin\Controller\Cliente' => Controller\ClienteController::class,
            'Admin\Controller\Login' => Controller\LoginController::class,
            'Admin\Controller\Estacionamento' => Controller\EstacionamentoController::class,
            'Admin\Controller\Cargo' => Controller\CargoController::class,
            'Admin\Controller\Vaga' => Controller\VagaController::class,
            'Admin\Controller\Funcionario' => Controller\FuncionarioController::class,
            'Admin\Controller\Carro' => Controller\CarroController::class
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
            'admin/index/index' => __DIR__ . '/../view/admin/index/index.phtml',
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
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
);
