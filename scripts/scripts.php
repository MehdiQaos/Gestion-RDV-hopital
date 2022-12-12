<?php
// include "../autoloader.php";
include __DIR__."/../autoloader.php";
session_start();
if(isset($_POST["login"])) login();
if(isset($_POST["signup"])) signup();
if(isset($_POST["book"]))   addAppointment();
if(isset($_POST["cancel_app"]))  cancelAppointment();
if(isset($_POST["profile_edit"]))            edit_profile();



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

function signup(){

    $full_name= $_POST["first_name"].$_POST["last_name"];
    $info_patient = array($full_name,$_POST["email"],$_POST["password"],$_POST["birthday"],$_POST["cin"],$_POST["phone"]);
    $patient1 = new patient(null,$info_patient[0],$info_patient[1],$info_patient[5],$info_patient[2],null,$info_patient[4],$info_patient[3],3);
    $result_check = $patient1->checkEmail();
    if($result_check==true){
        
        header("location:../sign.php");
    }
    else if($result_check==false){
        $result = $patient1->signup();
        if($result!=false){
                $_SESSION["user_id"]=$result;
                $_SESSION["user_name"]=$info_patient[0];
                $_SESSION["user_email"]=$info_patient[1];
                $_SESSION["user_photo"]=null;
            header("location:../dashboard_patient.php");
        }
        else{
            echo "heloo";
        die;
            header("location:../sign.php");
        }

    }
}

function  get_count_data(){
   return user::count_data();
}
function addAppointment(){
    $appointment1 = new appointment(NULL,null,null,"sbdf12",$_SESSION["user_id"],$_POST['id_session'],NULL,Null,Null);
    if($appointment1->addAppointment()){
    }
    else{
    }
}
function viewAppointment(){
    $filter="patient";
    $objects = appointment::viewAppointment($filter,$_SESSION["user_id"]);
    if($objects){
        return $objects;
        
        
    }
    else{
        return "no records";
    }
}
function cancelAppointment(){
    $app_id =$_POST['app_id'];
    $sess_id = $_POST['sess_id'];
    
    if(appointment::cancelAppointment($app_id,$sess_id)){
       
    }
    else{
       
    }
}
function view_patient_by_patient(){
    $filter ="patient";
    $rows =patient::view_patient($filter,$_SESSION["user_id"]);
    if($rows){
       return $rows;
    }
}

function view_sessions(){
$objects = Session::search_sessions($_SESSION["user_id"],null);
if($objects){
    return $objects;  
}
else{
    return "no records";
}
}
function view_doctors(){
    $rows = Doctor::viewDoctor();
    return $rows;
   
}
function edit_profile(){
    if($_POST["curent_pass"]!=$_POST["curent_pass_real"]){
        echo "password dont match curent pass";
    }
    else{ 
    $info_patient = array($_POST["full_edit"],$_POST["email_edit"],$_POST["pass"],$_POST["birth_edit"],$_POST["cin_edit"],$_POST["phone_edit"]);
    $patient1 = new patient(null,$info_patient[0],$info_patient[1],$info_patient[5],$info_patient[2],null,$info_patient[4],$info_patient[3],3);
    $result_check = $patient1->checkEmail();
    if($result_check==true){
        header("location:../sign.php");
    }
    else if($result_check==false){
        $result = $patient1->signup();
        if($result!=false){
                $_SESSION["user_id"]=$result;
                $_SESSION["user_name"]=$info_patient[0];
                $_SESSION["user_email"]=$info_patient[1];
                $_SESSION["user_photo"]=null;
            header("location:../dashboard_patient.php");
        }
        else{
            echo "heloo";
        die;
            header("location:../sign.php");
        }

    }
}

}





