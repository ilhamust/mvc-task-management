<?php
require_once '../app/core/Autoload.php';

$router = new Router();

// ROUTE GET
$router->addRoute('GET', '', 'AuthController@index');
$router->addRoute('GET', 'dashboard', 'DashboardController@index');
$router->addRoute('GET', 'tasks', 'TaskController@index');
$router->addRoute('GET', 'task/delete/{id}', 'TaskController@delete');
$router->addRoute('GET', 'login', 'AuthController@index');
$router->addRoute('GET', 'logout', 'AuthController@logout');
$router->addRoute('GET', 'register', 'AuthController@registerForm');

// ROUTE POST
$router->addRoute('POST', 'task/store', 'TaskController@store');
$router->addRoute('POST', 'task/update', 'TaskController@update');
$router->addRoute('POST', 'task/complete', 'TaskController@complete');
$router->addRoute('POST', 'auth/login', 'AuthController@login');
$router->addRoute('POST', 'auth/register', 'AuthController@register');

// DISPATCH dengan method
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);