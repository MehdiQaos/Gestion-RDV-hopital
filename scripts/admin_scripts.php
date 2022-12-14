<?php

 include __DIR__."/../autoloader_classes.php";


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


function listSpecialities(){
    $db_connect = new db_connect;
    $pdo = $db_connect->connection();
    $sql="SELECT * FROM specialities";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    $count = 1;
   foreach($result as $speciality){
    ?>
        <option value="<?= $speciality['id']; ?>"><?=  $speciality['name']; ?></option>
        <?php
   }
    
}

function listDoctors($input = null){
    $results = Doctor::viewDoctors($input);
    // echo '<pre>';
    //  var_dump($results);
    //  echo '</pre>';
    //  die();
    foreach($results as $item){
        ?>
    <tr class="">
        <td class="text-dark text-nowrap"><?=  $item->full_name; ?></td>
        <td class="text-dark text-nowrap"><?=  $item->email; ?></td>
        <td class="text-dark text-nowrap"><?=  $item->speciality; ?></td>
        <td class="text-dark d-flex flex-nowrap">
                <button class="btn ms-2 mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-doctor" id="update-btn"

                onclick="fillForm(
                    <?=  $item->id; ?>,
                    '<?=  $item->full_name; ?>',
                    '<?=  $item->email; ?>',
                    <?=  $item->speciality_id; ?>,
                    '<?=  $item->password; ?>',
                    '<?=  $item->phone; ?>'
                    
                )"
                ><i class="mycolor me-1 uil uil-pen"></i>Edit</button>


                
                <button class="btn ms-2 mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#view-doctor-modal" id="view-doctor"
                
                onclick="viewDoctor(
                    '<?=  $item->photo; ?>',
                    '<?=  $item->full_name; ?>',
                    '<?=  $item->email; ?>',
                    '<?=  $item->speciality; ?>',
                    '<?=  $item->phone; ?>'
                );"

                ><i class="mycolor me-1 uil uil-eye"></i>view</button>
                <button class="btn ms-2 mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-doctor" id="remove-btn"

                onclick = "removeDoctor(<?=  $item->id; ?>);"

                ><i class="mycolor me-1 uil uil-trash"></i>remove</button>
        </td>
    </tr>
            <?php
       }
}

