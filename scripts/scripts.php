<?php
// include "../autoloader.php";
include __DIR__."/../autoloader.php";
if(isset($_POST["login"])) login();
if(isset($_POST["signup"])) signup();



function login(){
        
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $user = new user;
        $user->email  = $email;
        $user->password  = $pass;
        $result = $user->login();
        if($result!=false){
            if($result["role_id"] ==1){
                echo "admin";
            }
            else if($result["role_id"]==2){
                echo "doctor";

            }
            else{
                echo "<h1>good job<h1>";
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
function 

?>