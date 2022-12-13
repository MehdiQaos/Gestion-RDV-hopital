<?php
session_start();
include __DIR__."/../autoloader.php";
if(isset($_POST["signup"])) signup();
if(isset($_POST["book"]))   addAppointment();
if(isset($_POST["cancel_app"]))  cancelAppointment();
if(isset($_POST["profile_edit"]))            edit_profile();
if(isset($_POST["delete_acc"]))            delete_profile();


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
        header("location:dashboard_patient.php?file=appoint");
    }
    else{
    }
}
function viewAppointment($option,$doc_filter,$input_date){
    $option="patient";
    $objects = appointment::viewAppointment($option,$doc_filter,$input_date,$_SESSION["user_id"]);
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

function view_sessions($input){
$objects = Session::search_sessions($_SESSION["user_id"],$input);
if($objects){
    return $objects;  
}
else{
    return "no records";
}
}
function view_doctors($input){
    $objects = Doctor::viewDoctors($input);
    return $objects;
}
function edit_profile(){
    if($_POST["curent_pass"]!=$_POST["curent_pass_real"]){
        echo "password dont match curent pass";
    }
    else{ 
    $info_patient = array($_POST["full_edit"],$_POST["email_edit"],$_POST["pass"],$_POST["birth_edit"],$_POST["cin_edit"],$_POST["phone_edit"]);
    $patient1 = new patient($_SESSION["user_id"],$info_patient[0],$info_patient[1],$info_patient[5],$info_patient[2],null,$info_patient[4],$info_patient[3],3);
        $result = $patient1->edit_profile();
        if($result!=false){
                $_SESSION["user_name"]=$info_patient[0];
                $_SESSION["user_email"]=$info_patient[1];
                $_SESSION["user_photo"]=null;
        }
        else{
        }
}
}
function delete_profile(){
        if($_POST["curent_pass"]!=$_POST["real_pass"]){
            echo "password error";

        }
        else if(patient::delete_profile($_SESSION["user_id"])==true){
            header("location:scripts/logout.php");
        }
        else{
            echo "there is an error";
            
        }
}







