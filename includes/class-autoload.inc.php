<?php

echo 'hello';
spl_autoload_register(function($className) {
    $extension = '.php';
    $path = '/classes/';
    $fileName = __DIR__ . $path . $className . $extension;
    echo "<br>" . $fileName;
    echo "<br>" . __DIR__;
    echo "<br>" . $_SERVER['DOCUMENT_ROOT'];

    if(!file_exists($fileName)) {
        // echo 'not found';
        return false;
    }
    
    require $fileName;
});