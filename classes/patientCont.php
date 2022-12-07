<?php
include "../autoloader.php";
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
            header("location:../sign.php");
        }
    }
    public function patientsignup($info_patient){
        $patient1 = new patient;
        $patient1->full_name    =$info_patient[0];
        $patient1->email        =$info_patient[1];
        $patient1->password     =$info_patient[2];
        $patient1->birthday     =$info_patient[3];
        $patient1->cin          =$info_patient[4];
        $patient1->phone          =0346263534;
        $patient1->photo          ="zcage12";
        $patient1->role_id          =3;
        $result = $patient1->signup();

    }
}
?>