<?php

define('BASE_DIR', realpath(__DIR__.'/../../'));
define('SYS_PATH', realpath(BASE_DIR . '/sys/'));
// dump($_BP);
if(!function_exists('app_path')){
    
	function app_path($path)
	{
		return realpath(BASE_DIR.'/app/'.$path);
	}
}