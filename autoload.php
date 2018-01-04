<?php



$GetFiles = function($folder, $pattern) 
{
	$fileList = array();

    $director = new RecursiveDirectoryIterator($folder);
    $iterator = new RecursiveIteratorIterator($director);
    $allfiles = new RegexIterator($iterator, $pattern, 0);

    foreach($allfiles as $file) {
    	$path = $file->getPathname();
        if(file_exists($file)) require_once $path;
    }
    return $fileList;
};

$folder = realpath(__DIR__.'/helpers/');
$pattern = '/\.php/msi';

$GetFiles($folder, $pattern);