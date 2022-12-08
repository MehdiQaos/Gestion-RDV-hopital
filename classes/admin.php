<?php
// include "../autoloader_classes.php";
require_once 'user.php';
require_once 'doctor.php';
require_once 'db_connect.php';

class Admin extends User{



    public static function createDoctor(Doctor $doctor){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM Users WHERE Users.email=?";
        $query =  $pdo->prepare($sql);
        $query->execute([$doctor->email]);
        $count = $query->rowCount();
        if($count == 0){
            $sql = "INSERT INTO Users  (full_name , email , phone , password , photo , role_id , doc_speciality_id) 
                    VALUES (?,?,?,?,?,?,?)";
                    $query =  $pdo->prepare($sql);
                    $query ->execute([$doctor->full_name,
                        $doctor->email,
                        $doctor->phone, 
                        $doctor->password,
                        $doctor->photo, 
                        $doctor->role, 
                        $doctor->speciality]);
                        if($query){
                            $_SESSION['doctorAdded'] = 'doctor added successfully';
                            header('location: dashboard_admin.php');
                        }else{
                            $_SESSION['failed'] = 'something goes wrong';
                            header('location: dashboard_admin.php');
                        }
                        
                }else{
            $_SESSION['failed'] = 'The email is already exist !!';
            header('location: dashboard_admin.php');
        }
    }


    public static function removeDoctor($doctorId){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "DELETE FROM Users WHERE Users.id = ? ";
        $query =  $pdo->prepare($sql);
        $query->execute([$doctorId]);
        if($query){
            $_SESSION['doctorDeleted'] = 'doctor has been removed !';
        }else{
            $_SESSION['failed'] = 'something goes wrong';
        }
    }

    public static function editDoctorProfile($id,$full_name, $email, $phone, $photo, $password, $speciality){
        // $doctor = new Doctor($full_name, $email, $phone, $photo, $password, $speciality);
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "UPDATE Users SET full_name = ? , email = ? , phone = ? , password = ? , photo = ? , doc_speciality_id = ? 
                    WHERE Users.id = ?";
        $query =  $pdo->prepare($sql);
        $query ->execute([$full_name,
                        $email,
                        $phone, 
                        $password,
                        $photo, 
                        $speciality,
                        $id]);
        if($query){
            $_SESSION['doctorUpdated'] = 'doctor has been Updated !';
            header('location: ./../dashboard_admin.php');
        }else{
            $_SESSION['failed'] = 'something goes wrong';
            header('location: ./../dashboard_admin.php');
        }
    }
}
?>