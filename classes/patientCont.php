<?php
include "autoloader_classes.php";
class patientCont{
    public function patientLogin($email,$password,$table){
        $patient1 = new patient;
        $result = $patient1->login($email,$password,$table);
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
            header("location:../sign.html");
        }
    }
}
?>