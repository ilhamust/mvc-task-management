<?php

require_once '../app/core/App.php';

// Panggil controller secara otomatis
$controller = new TaskController();
$controller->index();
