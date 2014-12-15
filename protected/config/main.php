<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$db_option=array(
                                /*my personel computer*/
                                'linden'=>array(
                                        'connectionString' => 'mysql:host=localhost;dbname=fast_listening',
                                        'emulatePrepare' => true,
                                        'username' => 'root',
                                        'password' => '12548442',
                                        'charset' => 'utf8',
                                ),
                                'ulgen'=>array(
                                'connectionString' => 'mysql:host=lindneo.com;port=3306;dbname=fast_listening',
                                'emulatePrepare' => true,
                                'username' => 'root',
                                'password' => '12548442',
                                'charset' => 'utf8',
                        )
                    );


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Akdeniz Üniversitesi-BÖTE',

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
			'password'=>'12548442',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('site/login'),
		),
		'authManager'=>array(
			 'class'=>'CDbAuthManager',
			 'connectionID'=>'db',
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>$db_option[gethostname()],
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
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
	),
	'defaultController' => 'Index',
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'salt'=>'ce85b99cc46752fffee35cab9a7b0278abb4c2d2055cff685af4912c49490f8d',
		'adminEmail'=>'webmaster@example.com',
	),
);
