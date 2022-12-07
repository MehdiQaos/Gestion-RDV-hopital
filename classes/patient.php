<?php
include "../autoloader.php";
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
        $pdo = $db_connect->connection();
        $sql = "INSERT INTO Users (full_name,email,phone,password,photo,cin, birthday,role_id,doc_speciality_id)
        VALUES (:full_name, :email, :phone, :password, :photo, :cin, :birthday, :role_id, :doc_speciality_id) "; 
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':full_name',        $this->full_name);
        $stmt->bindParam(':email',            $this->email);
        $stmt->bindParam(':password',         $this->password); 
        $stmt->bindParam(':photo',            $this->); 
        $stmt->bindParam(':cin',              $this->cin); 
        $stmt->bindParam(':birthday',         $this->birthday); 
        $stmt->bindParam(':role_id',          $this->role_id);
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