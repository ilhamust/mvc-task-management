<?php

require_once '../app/core/App.php';
require_once '../app/core/Router.php';

$router = new Router();

// Routing
$router->addRoute('', 'HomeController@index');  // Root URL
$router->addRoute('task', 'TaskController@index');

// Jalankan router
$router->dispatch($_SERVER['REQUEST_URI']);
