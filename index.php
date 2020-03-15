<?php
// options
require './options.php';
// classes
require_once DIR_BACK . '/class/Debug.php';
require_once DIR_BACK . '/class/Route.php';
// functions
require_once DIR_BACK . '/functions.php';
// route

$route = new Route();

if ($routes) {
    foreach ($routes as $item) {
        $route->add($item);
    }
}

$route->init();