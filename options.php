<?php

define('APP', dirname(__FILE__));
define('DIR_VIEW', APP . '/front');
define('DIR_ADMIN', DIR_VIEW . '/adminka');
define('DIR_BACK', APP . '/back');
define('DB_NAME', 'u3654617-suu');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');

$routes = [
    '/',
    '/admin',
    '/admin/add',
    '/admin/edit',
    '/admin/remove',
    '/signin',
    '/signup',
];