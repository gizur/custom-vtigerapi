<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Gizur API',
    'defaultController' => 'api',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.extensions.PHPMailer.*',
    ),
    'modules' => array(
    // uncomment the following to enable the Gii tool
    /*
      'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'Enter Your Password Here',
      // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters'=>array('127.0.0.1','::1'),
      ),
     */
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        
	'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                array('api/login', 'pattern' => '/<model:(Authenticate)>/<action:(login|logout)>', 'verb' => 'POST'),
            
                array('api/logout', 'pattern' => '/<model:(Authenticate)>/<action:(logout)>', 'verb' => 'POST'),
                array('api/Assets', 'pattern' => '/<model:(Assets)>', 'verb' => 'GET'),
                array('api/ViewCategoryAssets', 'pattern' => '/<model:(Assets)>/<category:(inoperation|damaged)>', 'verb' => 'GET'),
                array('api/ViewAssets', 'pattern' => '/<model:(Assets)>/<id:[0-9x]+>', 'verb' => 'GET'),
                array('api/Assets', 'pattern' => '/<model:(Assets)>/<actionType:\w+>/<filter:\w+>', 'verb' => 'GET'),
                array('api/Pickuplist', 'pattern' => '/<model:(Assets)>/<fieldname:\w+>', 'verb' => 'GET'),
                array('api/CreateAssets', 'pattern' => '/<model:(Assets)>', 'verb' => 'POST'),
                array('api/UpdateAssets', 'pattern' => '/<model:(Assets)>/<id:[0-9x]+>/<action:\w+>', 'verb' => 'PUT'),
		array('api/DeleteAssets', 'pattern' => '/<model:(Assets)>/<id:\w+>', 'verb' => 'DELETE'),
                array('api/Products', 'pattern' => '/<model:(Products)>', 'verb' => 'GET'),
                array('api/Users', 'pattern' => '/<model:(Users)>', 'verb' => 'GET'),
                array('api/Contacts', 'pattern' => '/<model:(Contacts)>', 'verb' => 'GET'),
                array('api/CreateContacts', 'pattern' => '/<model:(Contacts)>', 'verb' => 'POST'),

                array('api/DeleteContacts', 'pattern' => '/<model:(Contacts)>/<id:\w+>', 'verb' => 'DELETE'),
                array('api/Contacts', 'pattern' => '/<model:(Contacts)>/<actionType:\w+>/<filter:\w+>', 'verb' => 'GET'),
                array('api/Contacts', 'pattern' => '/<model:(Contacts)>/<id:[0-9x]+>', 'verb' => 'GET'),
                array('api/UpdateContacts', 'pattern' => '/<model:(Contacts)>/<id:[0-9x]+>/<action:\w+>', 'verb' => 'PUT'),
                array('api/Accounts', 'pattern' => '/<model:(Accounts)>', 'verb' => 'GET'),
                array('api/ExistingDamages', 'pattern' =>'/<model:(ExistingDamages)>/<category:(inoperation|damaged|all)>','verb' => 'GET'),
                array('api/ExistingDamages', 'pattern' =>'/<model:(ExistingDamages)>/<category:(inoperation|damaged|all)>/<year:\d{4}>/<month:\d{2}>/<trailerid:\w+>/<reportdamage:(yes|no|all)>','verb' => 'GET'),
                array('api/ExistingDamages', 'pattern' =>'/<model:(ExistingDamages)>/<category:(inoperation|damaged|all)>/<year:\d{4}>/<month:\d{2}>/<trailerid:\w+>/<reportdamage:(yes|no|all)>/<minLimit:\w+>/<maxLimit:\w+>','verb' => 'GET'),
                array('api/ViewCategoryHelpdesk', 'pattern' => '/<model:(HelpDesk)>/<category:(inoperation|damaged|all)>', 'verb' => 'GET'),
                array('api/ViewCategoryHelpdesk', 'pattern' => '/<model:(HelpDesk)>/<minLimit:\w+>/<maxLimit:\w+>/<category:(inoperation|damaged|all)>/<year:\d{4}>/<month:\d{2}>/<trailerid:\w+>/<reportdamage:(yes|no|all)>/<ticketstatus:\w+>', 'verb' => 'GET'),
                array('api/ViewHelpdesk', 'pattern' => '/<model:(HelpDesk)>/<id:[0-9x]+>', 'verb' => 'GET'),
		array('api/ViewImages', 'pattern' => '/<model:(DocumentAttachments)>/<id:[0-9x]+>/<path:(1|0)>', 'verb' => 'GET'),
                array('api/ViewImages', 'pattern' => '/<model:(DocumentAttachments)>/<id:[0-9x]+>', 'verb' => 'GET'),
                array('api/DamageStatus', 'pattern' => '/<model:(HelpDesk)>/<fieldname:\w+>', 'verb' => 'GET'),
                array('api/DamageUpdateStatus', 'pattern' => '/<model:(HelpDesk)>/<id:[0-9x]+>', 'verb' => 'PUT'),
                array('api/DamageUpdateStatusAndNotes', 'pattern' => '/<model:(HelpDesk)>/<action:(updatedamagenotes)>/<id:[0-9x]+>', 'verb' => 'PUT'),
                array('api/CreateTroubleticket', 'pattern' => '/<model:(HelpDesk)>', 'verb' => 'POST'),
               array('api/Document', 'pattern' => '/<model:(DocumentAttachment)>/<id:[0-9x]+>', 'verb' => 'POST'),  
                array('api/UpdatePassword', 'pattern' => '/<model:(Authenticate)>/<action:(reset|changepw)>', 'verb' => 'PUT'),
            ),
        ),
        'cache' => array(
            'class' => 'CMemCache',
            'servers' => array(
                array(
                    'host' => getenv('memcached_server'),
                    'port' => 11211,
                    'weight' => 100,
                ),
            ),
        ),
        // database settings are configured in database.php
       'db'=>array(
         'connectionString' =>'mysql:host='. getenv('db_server') . ';dbname=' . getenv('db_name'),
         'emulatePrepare' => true,
         'username' => getenv('db_username'),
         'password' => getenv('db_password'),
         'charset' => 'utf8',
          ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'api/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'vtRestUrl' => 'http://localhost/vtigercrm/webservice.php',
	'awsS3Bucket' => 'gizurcloud-clab',
        'awsS3BucketUrl' => 'http://gizurcloud-clab.s3-website-eu-west-1.amazonaws.com',
        'awsS3BackupBucket' => 'gc1-backups',
        'awsS3Region' => 'REGION_EU_W1',
        'clab_custom_fields' => Array(
            'HelpDesk' => Array(
                'tickettype' => 'cf_649',
                'trailerid' => 'cf_640',
                'damagereportlocation' => 'cf_661',
                'sealed' => 'cf_651',
                'plates' => 'cf_662',
                'straps' => 'cf_663',
                'reportdamage' => 'cf_654',
                'damagetype' => 'cf_659',
                'damageposition' => 'cf_658',
                'drivercauseddamage' => 'cf_657',
                'notes' => 'cf_664',
                'description1' => 'cf_666',
                'description2' => 'cf_667',
                'damagestatus' => 'cf_665'
            ),
            'Assets' => Array(
                'trailertype' => 'cf_660'
            )
        )
    ),
);
