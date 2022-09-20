<?php

use app\Framework\Classes\Router;
use app\Framework\Classes\View;

function path()
{
    [$path, $param] = explode('?', $_SERVER['REQUEST_URI']);
    
    return $path;
}

function request()
{
    return $_SERVER['REQUEST_METHOD'] ;
}

function executeRouter()
{
    try {

        $routes = require '../app/routes/web.php';
        $router = new Router();
        
        $router->execute($routes);

    } catch(\Throwable $t) {

        var_dump($t->getMessage());
    }
}

function view(string $view, array $data = [])
{
    try {
        $viewEngine = new View();
        $viewEngine->render($view, $data);
    } catch(\Throwable $t) {
        var_dump($t->getMessage());
    }
}

function redirect(string $uri, string $message = null)
{
    if($message) {
        $_SESSION['message'] = $message;
    }
    return header('Location:' . $uri);
}
