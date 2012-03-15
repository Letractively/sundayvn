<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Yealink Phone Book Search',
	

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',

	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('192.168.1.6', '127.0.0.1','::1'),
		),
		
		'user',
        'contact',
	
	),
	'language'=>'en',

	// application components
	'components'=>array(
		  'user'=>array(
                        // enable cookie-based authentication
                        'allowAutoLogin'=>true,
                        'loginUrl' => array('/user/login'),
						'returnUrl' => ''
                ),
	
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
            'urlFormat'=>'path',
            'caseSensitive' => false,
              'useStrictParsing' => false,
			'rules'=>array(
				//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                'gii'=>'gii',
	            'gii/<controller:\w+>'=>'gii/<controller>',
	            'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				'search/<phoneid:\w+>'=> 'contact/search/searchbyname'
			),
		),
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yealink',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '333',
			'charset' => 'utf8',
		),
		
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
		
		'session' => array (
			'autoStart' => true,
		    'class' => 'system.web.CDbHttpSession',
		    'connectionID' => 'db',
		    'sessionTableName' => 'sessions',
		),
		
		'cache'=>array(
            'class'=>'system.caching.CFileCache'
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
        'fullUrl'=>'http://localhost/yealink/htdocs/',
		'adminEmail'=>'vphat28@gmail.com',
		'requireLoginExcludes' => array(
			'site/*',			
			'user/login/*',
			'user/registration/*',
			'user/recovery/*',
		),
		'contact' => array(
			'google'=>array(
				'auth_url' => 'https://accounts.google.com/o/oauth2/auth',
				'request_token_url' => 'https://accounts.google.com/o/oauth2/token',
				'client_id' => '379139597429.apps.googleusercontent.com',
				'client_secret' => 'zSJM0Zq44qCiCq-AiLM3n-iA',
				'redirect_uri' => 'http://localhost/yealink/htdocs/index.php/contact/google/callback',
				'scope' => 'https://www.google.com/m8/feeds',
				'contact_url' => 'https://www.google.com/m8/feeds/contacts/default/full',
				'response_type' => 'code'
			)
		)
	),
	
	'behaviors' => array(
	),
	
);