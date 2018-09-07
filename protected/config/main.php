<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'简历分发系统',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
        //文件上传
        'file'=>array(
            'class' => 'application.components.File',
            'key' => 'file',
            'name'=>uniqid(),
        ),
    //        'assetManager' => array(
    //            'bundles' => array(
    //                'all' => array(
    //                    'class' => 'yii\web\AssetBundle',
    //                    'basePath' => '@webroot/assets',
    //                    'baseUrl' => '@web/assets',
    //                    'css' => array('all-xyz.css'),
    //                    'js' => array('all-xyz.js'),
    //                ),
    //                'A' => array('css' => array(), 'js' => array(), 'depends' => array('all')),
    //                'B' => array('css' => array(), 'js' => array(), 'depends' => array('all')),
    //                'C' => array('css' => array(), 'js' => array(), 'depends' => array('all')),
    //                'D' => array('css' => array(), 'js' => array(), 'depends' => array('all')),
    //            ),
    //        ),
    ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'lcf12307@qq.com',
        'uploadPath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'../../upload/',
	),
);
