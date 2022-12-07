<?php

include __DIR__."/../autoloader.php";
class user{
    private $id;
    private $full_name;
    private $email;
    private $phone = "dazdad";
    private $photo ="qdvd1313";
    private $password;
    private $role_id;
    public function __get($var){
        return $this->$var;
    }
    public function __set($var,$val){
        $this->$var = $val;
    }
    public function login(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM Users WHERE email=:email AND password=:password";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
        $row = $stmt->fetch();
        
        if(!empty($row)){
            return $row;
        }  
        else{
            return false;
        }
        unset($stmt);
        unset($pdo);
    }
    public static function count_data(){
        $db_connect = new db_connect ;
        $pdo = $db_connect->connection() ;
        $today = date("Y-m-d");
        $patientrow = $pdo->query("select  * from  Users where role_id='3'");
        $doctorrow = $pdo->query("select  * from Users where role_id='2'");
        $appointmentrow = $pdo->query("select  * from  appointments where booking_date>='$today';");
        $schedulerow = $pdo->query("select  * from  sessions where start_time>='$today';");
        $result = array($patientrow->rowCount(),$doctorrow->rowCount(),$appointmentrow->rowCount(),$schedulerow->rowCount());
        return $result;
        unset($stmt);
        unset($pdo);

    }
    
}
?>