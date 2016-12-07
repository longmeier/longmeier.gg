<?php
return array(
    //'配置项'=>'配置值'
    'URL_MODEL' => 3, // 如果你的环境不支持PATHINFO 请设置为3
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'demo',
    'DB_USER' => 'root',
    'DB_PWD' => '1234',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'dc_',
    'APP_AUTOLOAD_PATH' => '@.TagLib',
    'APP_GROUP_LIST' => 'Home,Web',
    'DEFAULT_GROUP' => 'Home',
    'APP_GROUP_MODE' => 1,
    'APP_SUB_DOMAIN_DEPLOY' => 1,
    'APP_SUB_DOMAIN_RULES' => array(
        'web' => array('Web/'),
        'home' => array('Home/'),

    ),


);