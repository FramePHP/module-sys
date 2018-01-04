<?php

// use FramePHP\App\Application;

/**
 ********************************************************
 *
 ********************************************************
*/
$App = FramePHP\App\Application::Instance();

/**
 ********************************************************
 * Intercept the request from user
 ********************************************************
*/
$App->setRequest(function($request){

});

/**
 ********************************************************
 * Collect registered routes first
 ********************************************************
*/
$App->setRouting(function($routes){

    //$route_ext = ['.sql', '.json', '.php', 'yml'];
    foreach (['sql', 'json', 'php', 'yml', 'xml'] as $ext) {
    	$routes = app_path("site/httpobject/routes.$ext");
    	if($routes && $ext == 'yml') return $routes;
    	if($routes && $ext == 'php') return require $routes;
    }

});

/**
 ********************************************************
 *
 ********************************************************
*/
$App->setResponse(function(){

});

/**
 ********************************************************
 *
 ********************************************************
*/
return $App;
