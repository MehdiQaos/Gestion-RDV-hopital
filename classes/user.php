<?php
include "autoloader_classes.php";
abstract class user{
    private $id;
    private $full_name;
    private $email;
    private $phone;
    private $photo;
    private $password;
    public function __get($var){
        return $this->$var;
    }
    public function __set($var,$val){
        $this->$var = $val;
    }
    public function login($email,$password,$table){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM Users WHERE email=:email AND password=:password";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password); 
        $stmt->execute();
        $row = $stmt->fetch();
        if(!empty($row)){
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