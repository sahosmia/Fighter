<?php

$routes = [
    'GET' => [
        ''           => 'HomeController@index',
        'about'      => 'AboutController@index',
        'contact'    => 'ContactController@index',

        // dynamic example
        'item/{name}'     => 'ItemController@show',
        'user/{id}/post/{slug}' => 'UserPostController@show',
    ],

    'POST' => [
        'contact' => 'ContactController@store',
    ]
];

return $routes;