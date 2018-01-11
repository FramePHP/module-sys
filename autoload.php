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

$apphelpers = realpath(__DIR__.'/code/');

$GetFiles($apphelpers, '/\.php/msi');