<?php

include __DIR__."/../autoloader.php";


if(isset($_POST["login"])) login();
if(isset($_POST["signup"])) signup();
if(isset($_POST['saveDoctor'])) saveDoctor();
if(isset($_POST['removeDoctor'])) removeDoctor();
if(isset($_POST['updateDoctor'])) updateDoctor();
if(isset($_POST['saveSession'])) saveSession();
if(isset($_POST['cancelSession'])) cancelSession();




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

function doctorSelect(){
    $db_connect = new db_connect;
    $pdo = $db_connect->connection();
    $sql="SELECT u.id, u.full_name FROM Users u WHERE u.role_id = 2";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    $count = 1;
   foreach($result as $doctor){
    ?>
        <option value="<?= $doctor['id']; ?>"><?=  $doctor['full_name']; ?></option>
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

                ><i class="mycolor me-1 uil uil-eye"></i>View</button>
                <button class="btn ms-2 mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-doctor" id="remove-btn"

                onclick = "removeDoctor(<?=  $item->id; ?>);"

                ><i class="mycolor me-1 uil uil-trash"></i>Remove</button>
        </td>
    </tr>
            <?php
       }
}


function saveSession(){
    $title = $_POST['sessionTitle'];
    $doctor_id = $_POST['sessionDoctor'];
    $max_num = $_POST['sessionNumber'];
    $description = $_POST['sessionDescription'];
    $end_time = $_POST['end'];
    $start_time = $_POST['start'];


    $session = new Session($title, 0 , $description, $start_time, $end_time, $doctor_id, $max_num);
    $session->add_session();
    $_SESSION['message'] = 'Session Added successfully';
    header('location: ./../dashboard_admin.php');
}


function listSessions(){
    $results = Session::view_sessions();
    // echo '<pre>';
    //  var_dump($results);
    //  echo '</pre>';
    //  die();
    foreach($results as $item){
        ?>
    <tr class="">
        <td class="text-dark text-nowrap"><?=  $item->title; ?></td>
        <td class="text-dark text-nowrap"><?=  $item->doctor_name; ?></td>
        <td class="text-dark text-nowrap"><?=  $item->start_time; ?></td>
        <td class="text-dark text-nowrap"><?=  $item->max_num; ?></td>
        <td class="text-dark d-flex flex-nowrap">

                <button class="btn ms-2 mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#view-session" id="view-doctor" 
                onclick="
                sessionInfo('<?=  $item->title; ?>',
                '<?=  $item->doctor_name; ?>',
                '<?=  $item->start_time; ?>',
                '<?=  $item->end_time; ?>',
                <?=  $item->max_num; ?>,
                <?=  $item->occupied; ?>,
                '<?=  $item->description; ?>');"
                ><i class="mycolor me-1 uil uil-eye"></i>View</button>
                <button class="btn ms-2 mycolor button1 rounded-pill" data-bs-toggle="modal"
                    onclick="cancelSession(<?=  $item->id; ?>);"
                data-bs-target="#remove-session" id="remove-btn"
                ><i class="mycolor me-1 uil uil-trash"></i>Cancel</button>

        </td>
    </tr>
            <?php
       }
}
// echo '<pre>'; 
// var_dump(Session::today_sessions());                                   
// echo '</pre>';

function listWeekSession(){
    $results = Session::week_sessions();
    // echo '<pre>';
    //  var_dump($results);
    //  echo '</pre>';
    //  die();
    foreach($results as $item){
    ?>
            <tr class="bg-light">
                <td class="text-dark text-nowrap"><?=  $item->title;?></td>
                <td class="text-dark text-nowrap"><?=  $item->doctor_name;?></td>
                <td class="text-dark text-nowrap"><?=  $item->start_time;?></td>
            </tr>
    <?php
       }
}

function cancelSession(){
    $sessionId = $_POST["sessionId"];
    Session::cancel_session($sessionId);
    $_SESSION['message'] = 'Session Has Been Canceled';
    header('location: ./../dashboard_admin.php');
}