<?php

include __DIR__."/../autoloader.php";

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
    public static function viewDoctor(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM users u inner join specialities s on u.doc_speciality_id = s.id WHERE u.role_id=?";
        $query =  $pdo->prepare($sql);
        $query->execute([2]);
        $rows = $query->fetchAll();
        if($rows!=null){
            return $rows;
        }else{
            $_SESSION['noDoctors'] = 'There is no doctors for the moment';
        }
    }
}