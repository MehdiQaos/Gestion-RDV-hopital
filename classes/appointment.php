<?php

class appointment{
    private $id;
    private $booking_date;
    private $order_in_session;
    private $ref_num;
    private $patient_id;
    private $session_id;

    public function __construct($id,$booking_date, $order_in_session, $reference_number, $patient_id,$session_id){
        $this->id =$id;
        $this->booking_date =$booking_date;
        $this->order_in_session = $order_in_session;
        $this->ref_num = $reference_number;
        $this->patient_id = $patient_id;
        $this->session_id = $session_id;
    }

    public function addAppointment(){
         
        
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "INSERT INTO appointments (booking_date, order_in_session, reference_number, patient_id, session_id) VALUES (:booking_date, :order_in_session, :reference_number, :patient_id, :session_id)";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':booking_date',        $this->booking_date);
        $stmt->bindParam(':order_in_session',            $this->order_in_session);
        $stmt->bindParam(':reference_number',            $this->ref_num);
        $stmt->bindParam(':patient_id',         $this->patient_id); 
        $stmt->bindParam(':session_id',              $this->session_id); 
        if($stmt->execute()) {
            return true;
        }  
        else{
            return false;
        }
        unset($$stmt);
        unset($pdo);

    }
    public static function viewAppointment($filter){
        $db_connect = new db_connect;
        $user_id = 12;
        $pdo = $db_connect->connection();
        $today =date("Y-m-d h:i:s");
        if($filter=="doctor"){
        $sql = "SELECT a.booking_date as booking_date,a.order_in_session as order_in_session,a.reference_number as reference_number,s.title as seesion_title,s.start_time as start_time,s.end_time as end_time,s.max_num as max_num,p.full_name as patient_name,p.id as patient_id,d.full_name as doctor_name,d.id as doctor_id from appointments a inner join sessions s on a.session_id = s.id inner join users p on p.id=a.patient_id inner join users d on d.id=s.doctor_id  where  d.id=:doctor_id and a.booking_date>=:today ";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':doctor_id', $user_id);

        }
        elseif($filter=="patient"){
        $sql = "SELECT a.booking_date as booking_date,a.order_in_session as order_in_session,a.reference_number as reference_number,s.title as seesion_title,s.start_time as start_time,s.end_time as end_time,s.max_num as max_num,p.full_name as patient_name,p.id as patient_id,d.full_name as doctor_name,d.id as doctor_id from appointments a inner join sessions s on a.session_id = s.id inner join users p on p.id=a.patient_id inner join users d on d.id=s.doctor_id  where  p.id=:patient_id and a.booking_date>=:today ";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':patient_id', $user_id);

        }
        else{
        $sql = "SELECT a.booking_date as booking_date,a.order_in_session as order_in_session,a.reference_number as reference_number,s.title as seesion_title,s.start_time as start_time,s.end_time as end_time,s.max_num as max_num,p.full_name as patient_name,p.id as patient_id,d.full_name as doctor_name,d.id as doctor_id from appointments a inner join sessions s on a.session_id = s.id inner join users p on p.id=a.patient_id inner join users d on d.id=s.doctor_id  where  a.booking_date>=:today ";
        $stmt =  $pdo->prepare($sql);
        }
        $stmt->bindParam(':today', $today);
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
    public static function cancelAppointment(){

    }
}