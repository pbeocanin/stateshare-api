<?php



$router->get('/', function () use ($router) {
    return response('okay', 200);
});

$router->post('/login', 'AuthController@authenticate');
$router->post('/user', 'UsersController@register');

$router->group(['middleware' => 'jwt.auth'],
    function() use ($router) {
        $router->get('/user/{id}', 'UsersController@getInfo');

    }
);