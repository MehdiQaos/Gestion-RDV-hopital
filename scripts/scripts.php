<?php
// include "../autoloader.php";
include __DIR__."/../autoloader.php";
session_start();
if(isset($_POST["login"])) login();
if(isset($_POST["signup"])) signup();
if(isset($_POST["book"]))   addAppointment();



function login(){
        
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $user = new user;
        $user->email  = $email;
        $user->password  = $pass;
        $result = $user->login();
        if($result!=false){
                $_SESSION["user_id"]=$result["id"];
                $_SESSION["user_name"]=$result["full_name"];
                $_SESSION["user_email"]=$result["email"];
                $_SESSION["user_photo"]=$result["photo"];
            if($result["role_id"] ==1){
                header("location:../dashboard_admin.php");
            }
            else if($result["role_id"]==2){
                header("location:../dashboard_doctor.php");
            }
            else{
                header("location:../dashboard_patient.php");
            }
        }
        else{
            echo "<h1>good job<h1>";
            header("location:../sign.php");
        }
       
}

function signup(){
  
    $full_name= $_POST["first_name"].$_POST["last_name"];
    $info_patient = array($full_name,$_POST["email"],$_POST["password"],$_POST["birthday"],$_POST["cin"]);
    $patient1 = new patient;
    $patient1->full_name    =$info_patient[0];
    $patient1->email        =$info_patient[1];
    $patient1->password     =$info_patient[2];
    $patient1->birthday     =$info_patient[3];
    $patient1->cin          =$info_patient[4];
    $patient1->phone        =0346263534;
    $patient1->photo        ="zcage12";
    $patient1->role_id      =3;
    $result_check = $patient1->checkEmail();
    if($result_check==true){
        header("location:../sign.php");
    }
    else if($result_check==false){
        $result = $patient1->signup();
        if($result!=false){
            session_start();
            header("location:../dashboard_patient.php");
        }
        else{
            header("location:../sign.php");
        }

    }
}

function  get_count_data(){
   return user::count_data();
}
function addAppointment(){
    $appointment1 = new appointment(NULL,"2023-10-04 18:12:12","2","sbdf12",1,1);
    if($appointment1->addAppointment()){
        echo "good";
    }
    else{
        echo "bad";
    }

   
}
function viewAppointment(){
    $filter="doctor";
    $rows = appointment::viewAppointment($filter);
    if($rows){
        return $rows;
        
        
    }
    else{
        return "no records";
    }
}