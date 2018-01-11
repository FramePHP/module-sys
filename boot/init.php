<?php

use FramePHP\App\Application;

/**
 ***********************************************************************
 * Get the instance of this application
 ***********************************************************************
 * This uses a singleton approach to initialize the application
*/
$App = Application::Instance();

// /**
//  ***********************************************************************
//  * Set the application environment
//  ***********************************************************************
//  * First and foremost, we ned to establish the application's environment,
//  * in order to know how to return the response and how much resources we
//  * need to allocate for it...
// */
$App->share('app_env', 'DEV'); // DEV | PROD | TEST

// /**
//  ***********************************************************************
//  * Set the application root path
//  ***********************************************************************
//  * Next and importantly, we need the application root path to know where
//  * all our login and files are stored...
// */
$App->share('app_root', APP_ROOT ?? dirname(__DIR__));

/**
 ***********************************************************************
 * Ready to run now
 ***********************************************************************
*/
return require realpath(__DIR__.'/run.php');
