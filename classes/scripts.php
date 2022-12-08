<?php
// include "./../autoloader_classes.php";
require_once 'user.php';

require_once 'doctor.php';
require_once 'db_connect.php';

session_start();


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



if(isset($_POST['saveDoctor'])) saveDoctor();

function saveDoctor(){
    $doctorName = $_POST['doctorName'];
    $doctorEmail = $_POST['doctorEmail'];
    $doctorPassword = $_POST['doctorPassword'];
    $doctorNumber = $_POST['doctorNumber'];
    $speciality = $_POST['speciality'];


    $doctor = new Doctor("$doctorName","$doctorEmail","$doctorNumber",'',"$doctorPassword",$speciality);
    $doctor->createDoctor();
}