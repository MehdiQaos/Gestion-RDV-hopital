<?php
include "../autoloader_classes.php";

class Doctor extends User {
    private $speciality;

    public function __construct($full_name, $email, $phone, $photo, $password, $speciality){
        $this->full_name = $full_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->photo = $photo;
        $this->password = $password;
        $this->speciality = $speciality;
        $this->role = 2;

    }

    public function createDoctor(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "INSERT INTO Users  (full_name,email , phone, password, photo, role_id, doc_speciality_id) 
        VALUES (?,?,?,?,?,?,?)";
            $this->full_name,
            $this->email,
            $this->phone, 
            $this->password,
            $this->photo, 
            $this->role, 
            $this->speciality
    }
}

