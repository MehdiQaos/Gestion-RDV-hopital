<?php
// include "../autoloader_classes.php";
// include './user.php';
require_once 'db_connect.php';

abstract class User{

    private $id;
    private $full_name;
    private $email;
    private $phone;
    private $photo;
    private $password;
    private $cin;
    private $role;

    public function __construct($full_name, $email, $phone, $password, $id = null, $cin = null, $role = null, $photo = null){
        $this->id = $id;
        $this->full_name = $full_name;
        $this->cin = $cin;
        $this->role = $role;
        $this->email = $email;
        $this->phone = $phone;
        $this->photo = $photo;
        $this->password = $password;
    }

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

    public static function count_users($role_id){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM Users WHERE Users.role_id= $role_id";
        $query = $pdo->query($sql);
        $count = $query->rowCount();

        return $count;
    }
}

?>