<?php

class Router {
    private $routes = [];

    public function addRoute($path, $handler) {
        $this->routes[$path] = $handler;
    }

    public function dispatch($requestUri) {
    $uri = parse_url($requestUri, PHP_URL_PATH);

    // Hapus base folder jika project tidak di root
    $baseFolder = '/eisenhower-app/public';
    if (strpos($uri, $baseFolder) === 0) {
        $uri = substr($uri, strlen($baseFolder));
    }

    // Bersihkan / di awal dan akhir
    $path = trim($uri, '/');

    // Treat index.php as root
    if ($path === 'index.php' || $path === '') {
        $path = '';
    }

    foreach ($this->routes as $route => $handler) {
        // Cek apakah route memiliki parameter {id}
        if (strpos($route, '{id}') !== false) {
            $pattern = str_replace('{id}', '([0-9]+)', $route);
            if (preg_match("#^$pattern$#", $path, $matches)) {
                [$controllerName, $method] = explode('@', $handler);
                $controllerFile = "../app/controllers/$controllerName.php";
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $controller = new $controllerName();
                    if (method_exists($controller, $method)) {
                        // Kirim id sebagai parameter
                        return $controller->$method($matches[1]);
                    }
                }
            }
        } else {
            // Route statis normal
            if ($route == $path) {
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
        }
    }

    // Default 404
    http_response_code(404);
    echo "404 Not Found: $path";
}

}
