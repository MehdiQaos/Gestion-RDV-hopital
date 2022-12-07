<?php
include "../autoloader.php";
if(isset($_POST["login"])) login();
if(isset($_POST["signup"])) signup();



function login(){
 $email = $_POST["email"];
 $pass = $_POST["password"];
 $patientCont1 = new patientCont;
 $patientCont1->patientLogin($email,$pass,"patients");
}

function signup(){
    $full_name= $_POST["first_name"].$_POST["last_name"];
    $info_patient = array($full_name,$_POST["email"],$_POST["password"],$_POST["birthday"],$_POST["cin"]);
    $patientCont1 = new patientCont;
    $patientCont1->patientsignup($info_patient);
}
?>

