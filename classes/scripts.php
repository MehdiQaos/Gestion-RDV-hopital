<?php
include "autoloader_classes.php";
if(isset($_POST["login"])) login();
if(isset($_POST["signup"])) signup();



function login(){
 $email = $_POST["email"];
 $pass = $_POST["password"];
 $patientCont1 = new patientCont;
 $patientCont1->patientLogin($email,$pass,"patients");
}

function signup(){
    $email = $_POST["email"];
    $pass = $_POST["password"];
}
?>