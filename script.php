<?php

require "./classes/db_connect.php";
$db = (new db_connect())->connection();

$sql = "INSERT INTO Sessions (title, description, start_time, end_time, max_num, doctor_id)
        VALUES (?, ?, ?, ?, ?, ?);
       ";
    
    $arr = [$_POST['sessionTitle'], $_POST['sessionDescription'], $_POST['start'], $_POST['end'], $_POST['sessionNumber'], 1];

$stm = $db->prepare($sql);
$stm->execute($arr);

echo "hello";