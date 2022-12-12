<?php
// include "../autoloader_classes.php";
require_once 'user.php';
require_once 'db_connect.php';

class Doctor extends User {

    private $speciality;

    public function __get($var){
        return $this->$var;
    }
    public function __set($var,$val){
        $this->$var = $val;
    }

    public function __construct($full_name, $email, $phone, $password, $speciality, $id = null, $cin = null, $role = null, $photo = null){
        parent::__construct($full_name, $email, $phone, $password, $id, $cin, 2, $photo);
        $this->speciality = $speciality;
    }

    // public static function viewDoctors(){
    //     $db_connect = new db_connect;
    //     $pdo = $db_connect->connection();
    //     $sql = "SELECT Users.*, specialities.name AS speciality FROM Users INNER JOIN specialities ON specialities.id = Users.doc_speciality_id WHERE Users.role_id= ? ";
    //     $query =  $pdo->prepare($sql);
    //     $query->execute([2]);

    public function createDoctor(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM Users WHERE Users.email=?";
        $query =  $pdo->prepare($sql);
        $query->execute([$this->email]);
        $count = $query->rowCount();
        if($count == 0){
            $sql = "INSERT INTO Users  (full_name , email , phone , password , photo , role_id , doc_speciality_id) 
                    VALUES (?,?,?,?,?,?,?)";
                    $query =  $pdo->prepare($sql);
                    $query ->execute([$this->full_name,
                        $this->email,
                        $this->phone, 
                        $this->password,
                        $this->photo, 
                        $this->role, 
                        $this->speciality]);
                        if($query){
                            $_SESSION['doctorAdded'] = 'doctor added successfully';
                            header('location: ../dashboard_admin.php');
                        }else{
                            $_SESSION['failed'] = 'something goes wrong';
                            header('location: ../dashboard_admin.php');
                        }
                        
                }else{
            $_SESSION['failed'] = 'The email is already exist !!';
            header('location: ../dashboard_admin.php');
        }
    }

    public static function viewDoctors($input = null){
        $input = trim($input);

        $sql = 'SELECT Users.*, specialities.name AS speciality
                FROM Users
                INNER JOIN specialities ON specialities.id = Users.doc_speciality_id
                WHERE Users.role_id = 2
               ';
        
        $params = [];

        if ($input && !empty($input)) {
            $sql .= 'AND Users.email LIKE :input
                        OR Users.full_name LIKE :input
                    ;';
            $params['input'] = $input . '%';
        }

        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $stm =  $pdo->prepare($sql);
        $stm->execute($params);
        $rows = $stm->fetchAll(PDO::FETCH_OBJ);

        $results = [];
        foreach($rows as $row) {
            $doctor = new Doctor($row->full_name, $row->email, $row->phone, $row->password, $row->speciality, $row->id, $row->cin, $row->role_id, $row->photo);
            array_push($results, $doctor);
        }

        return $results;
    }
}
