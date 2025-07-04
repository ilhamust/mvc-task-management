<?php

class Router {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        $this->routes[strtoupper($method)][$path] = $handler;
    }

    public function dispatch($requestUri, $requestMethod) {
        $uri = parse_url($requestUri, PHP_URL_PATH);


        $baseFolder = '/eisenhower-app/public';
        if (strpos($uri, $baseFolder) === 0) {
            $uri = substr($uri, strlen($baseFolder));
        }

        $path = trim($uri, '/');

        if ($path === 'index.php' || $path === '') {
            $path = '';
        }

        $methodRoutes = $this->routes[strtoupper($requestMethod)] ?? [];

        foreach ($methodRoutes as $route => $handler) {
            if (strpos($route, '{id}') !== false) {
                $pattern = str_replace('{id}', '([0-9]+)', $route);
                if (preg_match("#^$pattern$#", $path, $matches)) {
                    [$controllerName, $method] = explode('@', $handler);
                    $controllerFile = "../app/controllers/$controllerName.php";
                    if (file_exists($controllerFile)) {
                        require_once $controllerFile;
                        $controller = new $controllerName();
                        if (method_exists($controller, $method)) {
                            return $controller->$method($matches[1]);
                        }
                    }
                }
            } else {
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
        http_response_code(404);
        echo "404 Not Found: $path";
    }
}
