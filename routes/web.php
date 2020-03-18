<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
	ceck version //return $router->app->version();
*/

$router->group(['namespace' => 'Eks'], function() use ($router)
{
    
	$router->get('/', [
		'as' => 'home', 'uses' => 'HomeController@index'
	]);
	
	$router->get('/{q}', [
		'as' => 'find', 'uses' => 'HomeController@find'
	]);
	
	$router->get('/suggest/list', [
		'as' => 'suggest', 'uses' => 'HomeController@suggest'
	]);
	
	$router->get('/video/{title}/{id}/{desc}/{meta}', [
		'as' => 'detail', 'uses' => 'HomeController@detail'
	]);
	
	$router->get('/sitemap/xml', [
		'as' => 'sitemap', 'uses' => 'HomeController@sitemap'
	]);
	
	$router->get('/cmd/run/{cmd}', [
		'as' => 'cmdrun', 'uses' => 'HomeController@cmdrun'
	]);
	
	$router->get('/page/about', [
		'as' => 'page.about', 'uses' => 'HomeController@about'
	]);
	
	$router->get('/page/contact', [
		'as' => 'page.contact', 'uses' => 'HomeController@contact'
	]);
	
	$router->get('/page/shop', [
		'as' => 'page.shop', 'uses' => 'HomeController@shop'
	]);
	
	
});
