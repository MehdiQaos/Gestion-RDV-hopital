<?php
// include "../autoloader_classes.php";
// include './user.php';
require_once 'db_connect.php';

abstract class User{

    protected $id;
    protected $full_name;
    protected $email;
    protected $phone;
    protected $photo;
    protected $password;
    protected $cin;
    protected $role_id;

    public function __construct($full_name, $email, $phone, $password, $id = null, $cin = null, $role_id = null, $photo = null){
        $this->id = $id;
        $this->full_name = $full_name;
        $this->cin = $cin;
        $this->role = $role_id;
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

    public static function login($email,$password){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection(); 
        $sql = "SELECT * FROM Users WHERE email=:email AND password=:password";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $row = $stmt->fetch();

        if($row){
            echo 'hello';
            return $row;
        }
        else{
            return false;
        }
    }

        public static function count_data(){
            $db_connect = new db_connect;
            $pdo = $db_connect->connection();
            $today =date("Y-m-d h:i:s");
            $patientrow = $pdo->query("select  * from  Users where role_id='3'");
            $doctorrow = $pdo->query("select  * from Users where role_id='2'");
            $appointmentrow = $pdo->query("select  * from  appointments where booking_date>='$today';");
            $schedulerow = $pdo->query("select  * from  sessions where start_time>='$today';");
            $result = [
                'patients'         => $patientrow->rowCount(),
                'doctors'          => $doctorrow->rowCount(),
                'appointements'    => $appointmentrow->rowCount(),
                'sessions'         => $schedulerow->rowCount()
            ];
            return $result;
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