<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/theme'], function (Router $router) {

    $router->bind('slide', function ($id) {
        return app('Modules\Theme\Repositories\SlideRepository')->find($id);
    });

    $router->get('slides', [
        'as'         => 'admin.theme.slide.index',
        'uses'       => 'SlideController@index',
        'middleware' => 'can:theme.slides.index'
    ]);
    $router->get('slides/create', [
        'as'         => 'admin.theme.slide.create',
        'uses'       => 'SlideController@create',
        'middleware' => 'can:theme.slides.create'
    ]);
    $router->post('slides', [
        'as'         => 'admin.theme.slide.store',
        'uses'       => 'SlideController@store',
        'middleware' => 'can:theme.slides.create'
    ]);
    $router->get('slides/{slide}/edit', [
        'as'         => 'admin.theme.slide.edit',
        'uses'       => 'SlideController@edit',
        'middleware' => 'can:theme.slides.edit'
    ]);
    $router->put('slides/{slide}', [
        'as'         => 'admin.theme.slide.update',
        'uses'       => 'SlideController@update',
        'middleware' => 'can:theme.slides.edit'
    ]);
    $router->delete('slides/{slide}', [
        'as'         => 'admin.theme.slide.destroy',
        'uses'       => 'SlideController@destroy',
        'middleware' => 'can:theme.slides.destroy'
    ]);

    $router->bind('slider', function ($id) {
        return app('Modules\Theme\Repositories\SliderRepository')->find($id);
    });

    $router->get('slides/{slide}/sliders', [
        'as'         => 'admin.theme.slider.index',
        'uses'       => 'SliderController@index',
        'middleware' => 'can:theme.sliders.index'
    ]);
    $router->get('sliders/create/{slide}', [
        'as'         => 'admin.theme.slider.create',
        'uses'       => 'SliderController@create',
        'middleware' => 'can:theme.sliders.create'
    ]);
    $router->post('sliders', [
        'as'         => 'admin.theme.slider.store',
        'uses'       => 'SliderController@store',
        'middleware' => 'can:theme.sliders.create'
    ]);
    $router->get('sliders/{slider}/edit', [
        'as'         => 'admin.theme.slider.edit',
        'uses'       => 'SliderController@edit',
        'middleware' => 'can:theme.sliders.edit'
    ]);
    $router->put('sliders/{slider}', [
        'as'         => 'admin.theme.slider.update',
        'uses'       => 'SliderController@update',
        'middleware' => 'can:theme.sliders.edit'
    ]);
    $router->delete('sliders/{slider}', [
        'as'         => 'admin.theme.slider.destroy',
        'uses'       => 'SliderController@destroy',
        'middleware' => 'can:theme.sliders.destroy'
    ]);
// append


});
