<?php

$routes = [
    'GET' => [
        '/' => 'DashboardController@index::auth',
        '/login' => 'LoginController@index',
        '/torcedores/editar/' => 'FanController@edit::auth',
        '/torcedores/novo' => 'FanController@create::auth',
    ],
    'POST' => [
        '/login' => 'LoginController@login',
        '/torcedores/atualizar-lista' => 'FanController@store::auth',
        '/torcedores/atualizar/' => 'FanController@update::auth',
        '/torcedores/salvar' => 'FanController@singleStore::auth',
    ],
];

return $routes;