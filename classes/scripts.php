<?php
// include "./../autoloader_classes.php";
require_once 'user.php';
require_once 'admin.php';
require_once 'db_connect.php';

session_start();


if(isset($_POST["login"])) login();
if(isset($_POST["signup"])) signup();
if(isset($_POST['saveDoctor'])) saveDoctor();
if(isset($_POST['removeDoctor'])) removeDoctor();
if(isset($_POST['updateDoctor'])) updateDoctor();


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


function saveDoctor(){
    $doctorName = $_POST['doctorName'];
    $doctorEmail = $_POST['doctorEmail'];
    $doctorPassword = $_POST['doctorPassword'];
    $doctorNumber = $_POST['doctorNumber'];
    $speciality = $_POST['speciality'];


    $doctor = new Doctor("$doctorName","$doctorEmail","$doctorNumber",'',"$doctorPassword",$speciality);
    Admin::createDoctor($doctor);
}

function removeDoctor(){
    $id = $_POST['doctorId'];
    Admin::removeDoctor($id);
    header('location: ../dashboard_admin.php');
}

function updateDoctor(){
    $doctorId = $_POST['doctorId'];
    $doctorName = $_POST['doctorName'];
    $doctorEmail = $_POST['doctorEmail'];
    $doctorPassword = $_POST['doctorPassword'];
    $doctorNumber = $_POST['doctorNumber'];
    $speciality = $_POST['speciality'];


    Admin::editDoctorProfile($doctorId,"$doctorName","$doctorEmail","$doctorNumber",'',"$doctorPassword",$speciality);
}
