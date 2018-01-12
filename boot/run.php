<?php

use FramePHP\App\Application;
use FramePHP\Auth\Configs;
use FramePHP\Http\Request;
use FramePHP\Http\Response;
use FramePHP\Http\Routing;
use Zend\Diactoros\Response\SapiEmitter;


$APP = Application::isRunning();

/**
 ********************************************************
 * Intercept the request from user
 ********************************************************
 * Before anything else, we ned to determine if we need to
 * honor this requires, so we will collect the request and
 * check it for validity and decide what to do next...
*/
$App->share('Request', function(){
	  $request = Request::fromGlobals();
    return $request;
});

/**
 ********************************************************
 * Collect registered routes first
 ********************************************************
 * Next we need to collect all routes, this way we know
 * how to re-route the user from the request to the ap-
 * propriate response.
*/
$App->share('Routing', function() use (&$App){

		$routes_path = app_path('/site/httpobjects/routes/');
    $route_files = glob("$routes_path/*.*", GLOB_NOSORT);

    $routes = array();

    foreach ($route_files as $file_path) {
      $routes[] = require $file_path;
    }
    if(empty($routes)) return;
    $Routing = new Routing($App);
    return $Routing->make(array_filter($routes));

});

$App->share('Emitter', SapiEmitter::class);
// dump($App->Routing);

/**
 ********************************************************
 *  Collect all configurations
 ********************************************************
 * At this point we now need all configurations the app is
 * setting or has set and we need to load the into the app
*/
$App->share('Configs', function(){

  return new Configs();
});

/**
 ********************************************************
 * Prepare response
 ********************************************************
 * From the request, we know what type or response at this
 * point is expected, so we prepare it and feed to the app
*/
$App->share('Response', function(){
   return new Response();
});

$APP->share('DB', function(){
	return Database::connect();
});

return $APP;
