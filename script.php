<?php

// require __DIR__ . '/includes/class-autoload.inc.php';
require __DIR__ . '/autoloader.php';

$email = "jmacmakin0@abc.net.au";
$doc_name = "Justus MacMakin";
$date = "2023/02/18";
// $result = $session->search_session(128, $email);
// $result = $session->search_session(128, $doc_name);
$result = Session::search_sessions(70);
echo "<pre>";
var_dump($result);
echo "</pre>";

// require 'classes/session.php';

// function validateDate($date, $format) {
//     $d = DateTime::createFromFormat($format, $date);
//     return $d && $d->format($format) == $date;
// }

// if (filter_var($email, FILTER_VALIDATE_EMAIL))
//     echo "yes";
// else
//     echo "no";

// $name_pattern = "/^[a-zA-Z ]+$/";
// if (preg_match($name_pattern, 'El Mehdi Qaos'))
//     echo "yes";
// else
//     echo "no";
// // $date = '2022/11/30';
// if (validateDate($date, 'Y-m-d') ||
//     validateDate($date, 'd-m-Y') ||
//     validateDate($date, 'Y/m/d') ||
//     validateDate($date, 'd/m/Y'))
//     echo 'Yes';
// else
//     echo 'No';

// $date_pattern = "/^[0-9]{1,2}\\/[0-9]{1,2}\\/[0-9]{4}$/";

// echo preg_match($date_pattern, '20/01/2022');


// echo "<br>" . $session->add_session("youcode_session", "this is youcode new session", "2023-01-01 08:00:00", "2023-01-01 12:00:00", 3, 50);
// echo "<br>" . $session->add_session("Preventive medicine session", "this is youcode new session", "2023-01-10 08:00:00", "2023-01-10 12:00:00", 3, 60);
// echo "<br>" . $session->add_session("Ophthalmology session 2", "this is youcode new session", "2023-02-11 14:00:00", "2023-02-11 18:00:00", 2, 30);
// echo "<br>" . $session->add_session("Internal medicine session 23", "this is youcode new session", "2022-12-20 08:00:00", "2022-12-20 11:00:00", 1, 20);
// echo "<br>" . $session->add_session("Allergy and immunology", "this is Allergy and immunology new session", "2022-12-21 08:00:00", "2022-12-21 13:00:00", 2, 40);
// echo "<br>" . $session->add_session("Family medicine", "this is Family medicine new session", "2023-02-01 08:00:00", "2023-02-01 12:00:00", 4, 50);
// echo 'hello';
// echo "<br>" . $session->edit_session(2, "Family medicine", "new session of family medicine", "2023-02-01 07:00:00", "2023-02-01 13:00:00", 2, 70);
// echo $session->cancel_session(2);
// $filters = ['date' => '2023-02-01'];

// $result = $session->view_sessions();
// echo "<pre>";
// var_dump($result);
// echo "</pre>";

// require "./classes/db_connect.php";
// $db = (new db_connect())->connection();

// $sql = "INSERT INTO Sessions (title, description, start_time, end_time, max_num, doctor_id)
//         VALUES (?, ?, ?, ?, ?, ?);
//        ";
    
//     $arr = [$_POST['sessionTitle'], $_POST['sessionDescription'], $_POST['start'], $_POST['end'], $_POST['sessionNumber'], 1];

// $stm = $db->prepare($sql);
// $stm->execute($arr);

// echo "hello";