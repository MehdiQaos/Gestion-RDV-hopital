<?php
// include "../autoloader_classes.php";


require_once 'user.php';

require_once 'db_connect.php';
class patient extends User{
    private $birthday;
    private $cin;
    public function signup($info_patient){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "INSERT INTO Users (full_name,email,phone,password,photo,cin, birthday,role_id,doc_speciality_id)
        VALUES (:full_name, :email, :phone, :password, :photo, :birthday, :role_id, :doc_speciality_id) "; 
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':email',            $info_patient[0]);
        $stmt->bindParam(':password',         $info_patient[1]); 
        $stmt->bindParam(':full_name',        $info_patient[2]);
        $stmt->bindParam(':birthday',         $info_patient[3]); 
        $stmt->bindParam(':role_id',          3);
        $stmt->bindParam(':doc_speciality_id',$info_patient[5]); 
        $stmt->bindParam(':photo',            $info_patient[6]);
        $stmt->bindParam(':phone',            $info_patient[7]);
        $stmt->execute();
        $row = $stmt->fetch();
        if(count($row) > 0) {
            return $row;
        }  
        else{
            return false;
        }
        unset($$stmt);
        unset($pdo);
        
    }
}
?>