<?php
/**
 * Author: Cel Ticó Petit
 *
 * Company: Cencis s.p.
 * Contact: cel@cenics.net
 */
return array(

    'controllers' => array(
        'invokables' => array(
            'QuElFinder' => 'QuElFinder\Controller\QuElFinder',
        ),
    ),
    'router' => array(
        'routes' => array(
            'QuElFinder' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/quelfinder',
                    'defaults' => array(
                        'controller' => 'QuElFinder',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'connector' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/connector',
                            'defaults' => array(
                                'controller' => 'QuElFinder',
                                'action'     => 'connector',
                            ),
                        ),
                    ),
                    'ckeditor' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/ckeditor',
                            'defaults' => array(
                                'controller' => 'QuElFinder',
                                'action'     => 'ckeditor',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'QuConfig'=>array(
        'QuElFinder'=>array(
            'QuRoots'=>array(
                'driver'        => 'LocalFileSystem',
                'path'          =>  dirname(dirname(dirname(__DIR__))) .'/web/uploads/files/',
                'URL'           =>  '/uploads/files/',
                'accessControl' => 'access'
            ),
            'QuBasePath'=>'/qu-admin/js/plugins/elfinder',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);