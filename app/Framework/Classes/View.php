<?php
namespace app\Framework\Classes;

use Exception;

class View
{
    public function render(string $view, array $data)
    {
        $view = dirname(__FILE__, 2) . "/resources/views/{$view}.php";

        if(!file_exists($view)) {
            throw new Exception("View {$view} not found.");
        }

        ob_start();

        extract($data);
        require $view;
        $content = ob_get_contents();

        return $content;
    }
}