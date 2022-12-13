<?php


include __DIR__."/../autoloader.php";
class user{


    protected $id;
    protected $full_name;
    protected $email;
    protected $phone;
    protected $photo ;
    protected $password;
    protected $role_id;
    protected $cin;
    public function __construct($full_name, $email, $phone, $password, $id, $cin, $role_id, $photo){
        $this->id = $id;
        $this->full_name = $full_name;
        $this->cin = $cin;
        $this->role_id = $role_id;
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
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $row = $stmt->fetch();
       
        
        if($row){
            return $row;
        }  
        else{
            return false;
        }
        unset($stmt);
        unset($pdo);
    }

    public static function count_data(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $today =date("Y-m-d h:i:s");
        $patientrow = $pdo->query("select  * from  Users where role_id='3'");
        $doctorrow = $pdo->query("select  * from Users where role_id='2'");
        $appointmentrow = $pdo->query("select  * from  appointments where booking_date>='$today';");
        $schedulerow = $pdo->query("select  * from  sessions where start_time>='$today';");
        $result = array($patientrow->rowCount(),$doctorrow->rowCount(),$appointmentrow->rowCount(),$schedulerow->rowCount());
        return $result;
        unset($stmt);
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