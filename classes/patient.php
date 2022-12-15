<?php
include __DIR__."/../autoloader.php";
class patient extends user{



    private $birthday;
    public function __construct($id,$full_name, $email, $phone, $password, $photo ="user.png", $cin ,$birthday,$role_id){
        parent::__construct($full_name, $email, $phone, $password, $id, $cin, 3, $photo);
        $this->birthday = $birthday;
    }
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
            return $pdo->lastInsertId();
           
        }  
        else{
            return false;
        }
        unset($$stmt);
        unset($pdo);
        
    }

    public  function checkEmail(){
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
    public static function view_patient($filter,$user_id){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        if($filter=="doctor"){
        $sql = "SELECT u.id as user_id,u.full_name as full_name,u.email as email,u.phone as phone,u.password as password,u.photo as photo,u.cin as cin,u.birthday as birthday from users u inner join appointments a ON a.patient_id=u.id inner join sessions s ON s.doctor_id=:user_id where role_id=3";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        }
        elseif($filter=="patient"){
        $sql = "SELECT u.id as user_id,u.full_name as full_name,u.email as email,u.phone as phone,u.password as password,u.photo as photo,u.cin as cin,u.birthday as birthday FROM users u WHERE id=:patient_id ";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':patient_id', $user_id);
        }
        else{
        $sql = "SELECT u.id as user_id,u.full_name as full_name,u.email as email,u.phone as phone,u.password as password,u.photo as photo,u.cin as cin,u.birthday as birthday  FROM users u where role_id=3";
        $stmt =  $pdo->prepare($sql);
        }
        $stmt->execute();
        $rows = $stmt->fetchAll();
        if(!empty($rows)){
            return $rows;
        }  
        else{
            return false;
        }
        unset($stmt);
        unset($pdo);
    }
    public function edit_profile(){
        $db_connect = new db_connect;
        $fack=null;
        $pdo = $db_connect->connection();
        $sql = "UPDATE users SET full_name=:full_name,email=:email,phone=:phone,password=:password,photo=:photo,cin=:cin,birthday=:birthday,role_id=:role_id,doc_speciality_id=:doc_speciality_id WHERE id=:id"; 
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':id',               $this->id);
        $stmt->bindParam(':full_name',        $this->full_name);
        $stmt->bindParam(':email',            $this->email);
        $stmt->bindParam(':phone',            $this->phone);
        $stmt->bindParam(':password',         $this->password); 
        $stmt->bindParam(':photo',            $this->photo); 
        $stmt->bindParam(':cin',              $this->cin); 
        $stmt->bindParam(':birthday',         $this->birthday); 
        $stmt->bindParam(':role_id',          $this->role_id);
        $stmt->bindParam(':doc_speciality_id', $fack);
        if($stmt->execute()){
            return true;
            
        }  
        else{
            return false;
        }
        unset($$stmt);
        unset($pdo);
        
    
    }
    public static function delete_profile($user_id){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "DELETE FROM `users` WHERE id=:user_id";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':user_id' ,$user_id);
        $stmt->execute();
        if($stmt->execute()){
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