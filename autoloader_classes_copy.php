
<?php

spl_autoload_register(function($className) { 
    $file = __DIR__.'/classes/'.$className.'.php'; 
    if(file_exists($file)) { 
        require $file; 
    }
    else{
       echo "not found";
    }
});
?>