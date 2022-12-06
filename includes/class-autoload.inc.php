<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $extension = '.class.php';
    $path = 'classes/';
    $fileName = $path . $className . $extension;

    if(!file_exists($fileName))
        return false;
    
    require_once $fileName;
}