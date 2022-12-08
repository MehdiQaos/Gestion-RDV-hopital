<?php

include __DIR__."/../autoloader.php";
session_start();

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
        $sql = "SELECT * FROM Users WHERE Users.email=?";
        $query =  $pdo->prepare($sql);
        $query->execute([$this->email]);
        $count = $query->rowCount();
        if($count == 0){
            $sql = "INSERT INTO Users  (full_name , email , phone , password , photo , role_id , doc_speciality_id) 
                    VALUES (?,?,?,?,?,?,?)";
                    $query =  $pdo->prepare($sql);
                    $query ->execute([$this->full_name,
                        $this->email,
                        $this->phone, 
                        $this->password,
                        $this->photo, 
                        $this->role, 
                        $this->speciality]);
                        if($query){
                            $_SESSION['doctorAdded'] = 'doctor added successfully';
                            header('location: ../dashboard_admin.php');
                        }else{
                            $_SESSION['failed'] = 'something goes wrong';
                            header('location: ../dashboard_admin.php');
                        }
                        
                }else{
            $_SESSION['failed'] = 'The email is already exist !!';
            header('location: ../dashboard_admin.php');
        }
    }

    public function viewDoctor(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM Users WHERE Users.role_id=?";
        $query =  $pdo->prepare($sql);
        $query->execute([$this->role]);
        $count = $query->rowCount();

        if($count != 0){
            while($result = $query->fetch()){
                ?>
                <td class="text-dark"><?=  $result['full_name']; ?></td>
                <td class="text-dark"><?=  $result['email']; ?></td>
                <td class="text-dark"><?=  $result['speciality']; ?></td>
                <td class="text-dark">
                        <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-doctor" id="update-btn"><i class="mycolor me-1 uil uil-pen"></i>Edit</button>
                        <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#view-doctor" id="view-doctor-btn"><i class="mycolor me-1 uil uil-eye"></i>view</button>
                        <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-doctor" id="remove-btn"><i class="mycolor me-1 uil uil-trash"></i>remove</button>
                </td>
                    <?php
                    $count++;
               }
        }else{
            $_SESSION['noDoctors'] = 'There is no doctors for the moment';
        }
    }
}
