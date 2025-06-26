<?php

class Router {
    private $routes = [];

    public function addRoute($path, $handler) {
        $this->routes[$path] = $handler;
    }

    public function dispatch($requestUri) {
        $basePath = trim(dirname($_SERVER['SCRIPT_NAME']), '/');
        $uri = parse_url($requestUri, PHP_URL_PATH);

// Hilangkan base path dan index.php dari URI
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$path = str_replace($basePath, '', $uri);
$path = trim($path, '/');

// Optional: jika URI = index.php, treat as ''
if ($path === 'index.php') {
    $path = '';
}


        // Hapus base path (jika folder proyek kamu bukan di root)
        if ($basePath && strpos($path, $basePath) === 0) {
            $path = trim(substr($path, strlen($basePath)), '/');
        }

        if (array_key_exists($path, $this->routes)) {
            $handler = $this->routes[$path];
            [$controllerName, $method] = explode('@', $handler);

            $controllerFile = "../app/controllers/$controllerName.php";
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();
                if (method_exists($controller, $method)) {
                    return $controller->$method();
                }
            }
        }

        // Default 404
        http_response_code(404);
        echo "404 Not Found: $path";
    }
}