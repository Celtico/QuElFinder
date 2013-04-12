<?php
/**
 * @Author: Cel Ticó Petit
 * @Contact: cel@cenics.net
 * @Company: Cencis s.c.p.
 */
//echo dirname(dirname(dirname(__DIR__))) .'/web/uploads/files/plupload/';
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
                //Module
                'path'  =>  dirname(dirname(dirname(__DIR__)))  . '/web/uploads/files',
                //Vendor
                //'path'  =>  dirname(dirname(dirname(dirname(__DIR__))))  . '/public/uploads/files',
                'URL'           =>  '/uploads/files/plupload/',
                'accessControl' => 'access',
                'attributes' => array(
                    array(
                        'read'   => false,
                        'write'  => false,
                        'locked' => true,
                        'hidden' => false
                    )
                )

            ),

            'elFinder'=>array(
                'url'=>'/quelfinder/connector',
                'lang'=>   'ca',
                'height'=> '500',
                'width'=> '500',
            ),

            'BasePath'=>'/js/plugins/elfinder',

            'LoadCss'=>array(

                'css'=> array(

                        /*
                        'common',
                        'dialog',
                        'toolbar',
                        'navbar',
                        'statusbar',
                        'contextmenu',
                        'cwd',
                        'quicklook',
                        'commands',
                        'fonts',
                        */
                        'style',
                        'theme',
                        'elfinder.min',

                    ),
            ),

            'LoadJs'=>array(

                //'elfinder.min',

                'jquery.elfinder',
                'elFinder',
                'elFinder.version',
                'elFinder.resources',
                'elFinder.options',
                'elFinder.history',
                'elFinder.command',


                'ui'=> array(
                    'overlay',
                    'workzone',
                    'navbar',
                    'dialog',
                    //'tree',
                    'cwd',
                    'toolbar',
                    'button',
                    'uploadButton',
                    'viewbutton',
                    'searchbutton',
                    'sortbutton',
                    'panel',
                    'contextmenu',
                    'path',
                    'stat',
                    'places',
                ),

                'commands'=> array(
                    'open',
                    'reload',
                    'home',
                    'up',
                    'back',
                    'forward',
                    'getfile',
                    'quicklook',
                    'download',
                    'rm',
                    'duplicate',
                    'rename',
                    'mkdir',
                    'mkfile',
                    'upload',
                    'copy',
                    'cut',
                    'paste',
                    'edit',
                    'extract',
                    'archive',
                    'search',
                    'info',
                    'view',
                    'help',
                    'resize',
                    'sort',
                    'netmount'
                ),

                'i18n'=> array(
                    'elfinder.ca'
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);