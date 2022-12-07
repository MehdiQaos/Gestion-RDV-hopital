<?php
include __DIR__."/../autoloader.php";
class patient extends user{
    private $birthday;
    private $cin;
    public function __get($var){
        return $this->$var;
    }
    public function __set($var,$val){
        $this->$var = $val;
    }
    public function signup(){
        $db_connect = new db_connect;
        $fack;
        $pdo = $db_connect->connection();
        $sql = "INSERT INTO Users (full_name,email,phone,password,photo,cin, birthday,role_id,doc_speciality_id)
        VALUES (:full_name, :email, :phone, :password, :photo, :cin, :birthday, :role_id, :doc_speciality_id) "; 
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':full_name',        $this->full_name);
        $stmt->bindParam(':email',            $this->email);
        $stmt->bindParam(':phone',            $this->phone);
        $stmt->bindParam(':password',         $this->password); 
        $stmt->bindParam(':photo',            $this->photo); 
        $stmt->bindParam(':cin',              $this->cin); 
        $stmt->bindParam(':birthday',         $this->birthday); 
        $stmt->bindParam(':role_id',          $this->role_id);
        $stmt->bindParam(':doc_speciality_id', $fack);
        if($stmt->execute()) {
            return true;
           
        }  
        else{
            return false;
        }
        unset($$stmt);
        unset($pdo);
        
    }

    public function checkEmail(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT email FROM Users WHERE email=:email";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $row = $stmt->fetch();
        if(!empty($row)){
            return true;
        }  
        else{
            return false;
        }
        unset($stmt);
        unset($pdo);

    }


}
?>