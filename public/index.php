<?php
require_once '../app/core/Autoload.php';

$router = new Router();

$router->addRoute('login', 'AuthController@index');
$router->addRoute('dashboard', 'DashboardController@index');
$router->addRoute('tasks', 'TaskController@index');
$router->addRoute('task/store', 'TaskController@store');
$router->addRoute('task/update', 'TaskController@update');
$router->addRoute('task/delete/{id}', 'TaskController@delete');


$router->dispatch($_SERVER['REQUEST_URI']);

