<?php
include "../autoloader_classes.php";

class Admin extends User{


}


$doctor = new Doctor('Ossama','ossama@gmail.com','+212342354657','','123Azerty',3);
$doctor->createDoctor();

?>