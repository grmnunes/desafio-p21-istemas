<?php

namespace app\Framework\Classes;

use Exception;

class Router
{
   private $path, $request;
   
   private function findRouter($routes)
   {
        if(!isset($routes[$this->request])) {
            throw new Exception("Route: {$this->path} not found.");
        }

        if(!isset($routes[$this->request][$this->path])) {
            throw new Exception("Route: {$this->path} not found.");
        }
   }

   private function findController(string $namespace, string $controller, string $action)
   {
        if(!class_exists($namespace)) {
            throw new Exception("Controller: {$controller} not found.");
        }

        if(!method_exists($namespace, $action)) {
            throw new Exception("method {$action} not found on {$controller}.");
        }
   }

   public function execute($routes)
   {
        $this->path = path();
        $this->request = request();

        $this->findRouter($routes);

        [$controller, $action] = explode('@', $routes[$this->request][$this->path]);

        if(strpos($action, '::')) {
            [$action, $auth] = explode('::', $action);
            Auth::check($auth);
        }

        $namespace = "app\\Controllers\\{$controller}";

        $this->findController($namespace, $controller, $action);

        $controllerInstance = new $namespace;
        $controllerInstance->$action();
   }
}