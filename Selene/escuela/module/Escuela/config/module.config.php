<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Escuela\Controller\Escuela' => 'Escuela\Controller\EscuelaController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'escuela' => __DIR__ . '/../view',
        ),
    ),
	'router' => array(
        'routes' => array(
            'escuela' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/escuela[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Escuela\Controller\Escuela',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'escuela' => __DIR__ . '/../view',
        ),
    ),
);