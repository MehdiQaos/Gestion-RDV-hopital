<?php
// include "../autoloader.php";
include __DIR__."/../autoloader.php";
session_start();
if(isset($_POST["login"])) login();
function login(){
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $resul = user::login($email,$pass);
        if($resul!=false){
                $_SESSION["user_id"]=$resul["id"];
                $_SESSION["user_name"]=$resul["full_name"];
                $_SESSION["user_email"]=$resul["email"];
                $_SESSION["user_photo"]=$resul["photo"];
            if($resul["role_id"] ==1){
                header("location:../dashboard_admin.php");
            }
            else if($resul["role_id"]==2){
                header("location:../dashboard_doctor.php");
            }
            else{
                header("location:../dashboard_patient.php");
            }
        }
        else{
            header("location:../sign.php");
        }
       
}

