<?php

/**
 * @var \Illuminate\Routing\Router $router
 */
$router = app('router');

$router->get('/', 'SuperheroesController@index')->name('index');
$router->get('show/{superheroId}', 'SuperheroesController@show')
    ->where('superheroId', '[0-9]+')
    ->name('show');
$router->get('/create', 'SuperheroesController@create')->name('create');
$router->post('/store', 'SuperheroesController@store')->name('store');
$router->get('/edit/{superheroId}', 'SuperheroesController@edit')
    ->where('superheroId', '[0-9]+')
    ->name('edit');
$router->post('/update', 'SuperheroesController@update')->name('update');
$router->get('/destroy/{superheroId}', 'SuperheroesController@destroy')
    ->where('superheroId', '[0-9]+')
    ->name('destroy');
$router->get('/images/{imageId}/destroy', 'SuperheroesImagesController@destroy')
    ->where('imageId', '[0-9]+')
    ->name('image.destroy');