<?php
return array(
    'URL_MODEL' => 2, // 如果你的环境不支持PATHINFO 请设置为3
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
     'DB_NAME' => 'demo',
    'DB_USER' => 'root',
    'DB_PWD' => '!db1270702',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'dc_',
    'APP_KEY' => '64fd122ebb07efa6df96987376534e3f',                                 //网站的AppID  登录open.liuliangsc.com  【我的应用】
    'APP_Secret' => '0c2b31f34f67359f0509c3c1e9853e07',                              //网站的 AppSecret
    'code_url' => 'http://www.liuliangsc.com/interfaces/getcode.php',
    'token_url' => 'http://www.liuliangsc.com/interfaces/gettoken.php',
    'plat_oper_url' => 'http://www.liuliangsc.com/interfaces/plat_oper.php',
    'callback_url' => 'http://test.liuliangsc.com/index.php?s=/Home/Ask/callback',
    'back_url' => 'http://test.liuliangsc.com/index.php?s=/Home/Returndata/index',

);