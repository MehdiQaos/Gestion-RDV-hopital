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

    public function __construct($full_name, $email, $phone, $photo, $password, $speciality){
        $this->full_name = $full_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->photo = $photo;
        $this->password = $password;
        $this->speciality = $speciality;
        $this->role = 2;

    }

    public static function viewDoctors(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT Users.*, specialities.name AS speciality FROM Users INNER JOIN specialities ON specialities.id = Users.doc_speciality_id WHERE Users.role_id= ? ";
        $query =  $pdo->prepare($sql);
        $query->execute([2]);
        $count = $query->rowCount();

        if($count != 0){
            while($result = $query->fetch()){
                ?>
            <tr class="">
                <td class="text-dark"><?=  $result['full_name']; ?></td>
                <td class="text-dark"><?=  $result['email']; ?></td>
                <td class="text-dark"><?=  $result['speciality']; ?></td>
                <td class="text-dark">
                        <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-doctor" id="update-btn"

                        onclick="fillForm(
                            <?=  $result['id']; ?>,
                            '<?=  $result['full_name']; ?>',
                            '<?=  $result['email']; ?>',
                            <?=  $result['doc_speciality_id']; ?>,
                            '<?=  $result['password']; ?>',
                            '<?=  $result['phone']; ?>'
                            
                        )"
                        ><i class="mycolor me-1 uil uil-pen"></i>Edit</button>
                        <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#view-doctor" id="view-doctor"
                        
                        onclick="viewDoctor(
                            '<?=  $result['photo']; ?>',
                            '<?=  $result['full_name']; ?>',
                            '<?=  $result['email']; ?>',
                            '<?=  $result['speciality']; ?>',
                            '<?=  $result['phone']; ?>'
                        );"

                        ><i class="mycolor me-1 uil uil-eye"></i>view</button>
                        <button class="btn mycolor button1 rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-doctor" id="remove-btn"

                        onclick = "removeDoctor(<?=  $result['id']; ?>);"

                        ><i class="mycolor me-1 uil uil-trash"></i>remove</button>
                </td>
            </tr>
                    <?php
                    // $count++;
               }
        }else{
            $_SESSION['noDoctors'] = 'There is no doctors for the moment';
        }
    }

    

    public static function countDoctors(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM Users WHERE Users.role_id= ? ";
        $query =  $pdo->prepare($sql);
        $query->execute([2]);
        $count = $query->rowCount();

        return "$count";
    }
}
