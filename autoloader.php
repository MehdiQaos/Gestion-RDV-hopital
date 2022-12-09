<?php

spl_autoload_register(function($className) { 
    $file = ''.$className.'.php'; 
    if(file_exists($file)) { 
        require $file; 
    }
    else{
<<<<<<< HEAD:autoloader_classes.php
       echo "not found";
=======
       echo "not found"; // TODO: change to return false;
>>>>>>> 88aa8d211604e259ae2a66f9fbbca083f0dad7c0:autoloader.php
    }
});