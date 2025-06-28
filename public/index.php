<?php

require_once '../app/core/Autoload.php';

$router = new Router();

// Routing default
$router->addRoute('', 'DashboardController@index');

// Routing task CRUD
$router->addRoute('task', 'TaskController@index'); // list task
$router->addRoute('task/create', 'TaskController@create'); // form tambah
$router->addRoute('task/store', 'TaskController@store'); // simpan task baru
$router->addRoute('task/edit', 'TaskController@edit'); // form edit task
$router->addRoute('task/update', 'TaskController@update'); // update task
$router->addRoute('task/delete', 'TaskController@delete'); // hapus task

// Jalankan router
$router->dispatch($_SERVER['REQUEST_URI']);
