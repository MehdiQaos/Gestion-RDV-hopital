
<?php

spl_autoload_register(function($className) { 
    $file = 'assets/php/classes/'.$className.'.php'; 
    if(file_exists($file)) { 
        require $file; 
    }
    else{
       echo "not found";
       exit;
    }
});


?>