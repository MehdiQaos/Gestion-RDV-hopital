<?php

include 'autoloader.php';

class Session {
    private $id, $title, $occupied, $description, $start_time, $end_time, $doctor_id, $max_num, $doctor_name;

    public function __get($var){
        return $this->$var;
    }
    public function __set($var,$val){
        $this->$var = $val;
    }

    public function __construct($title, $occupied, $description, $start_time, $end_time, $doctor_id, $max_num, $id = null, $doctor_name = null) {
        $this->id = $id;
        $this->title = $title;
        $this->occupied = $occupied;
        $this->description = $description;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->doctor_id = $doctor_id;
        $this->doctor_name = $doctor_name;
        $this->max_num = $max_num;
    }

    public function add_session() {
        $db = new db_connect();
        $pdo = $db->connection();
        $sql = 'INSERT INTO Sessions (title, description, start_time, end_time, doctor_id, max_num)
                VALUES (:title, :occupied, :description, :start_time, :end_time, :doctor_id, :max_num);
                ';
        $params = [
            'title' => $this->title,
            'occupied' => $this->occupied,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'doctor_id' => $this->doctor_id,
            'max_num' => $this->max_num
        ];
        
        $stm = $pdo->prepare($sql);
        return $stm->execute($params);
    }

    public static function edit_session($id, $title, $occupied, $description, $start_time, $end_time, $doctor_id, $max_num) {
        $db = new db_connect();
        $pdo = $db->connection();
        $sql = 'UPDATE Sessions
                SET title = :title, description = :description, start_time = :start_time, end_time = :end_time, doctor_id = :doctor_id, max_num = :max_num
                WHERE id = :id;
                ';

        $params = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'doctor_id' => $doctor_id,
            'max_num' => $max_num
        ];

        $stm = $pdo->prepare($sql);
        if ($stm->execute($params)) {
            return new self($title, $occupied, $description, $start_time, $end_time, $doctor_id, $max_num, $id);
        }
        return null;
    }
    
    public function cancel_session() {
        if ($this->id == null)
            return false;
        $db = new db_connect();
        $pdo = $db->connection();
        $sql = 'DELETE FROM Sessions
                WHERE id = :session_id;
                ';
        
        $stm = $pdo->prepare($sql);
        return $stm->execute(['session_id' => $this->id]);
    }

    public static function view_sessions($filters = []) {
        // how to set $filters:
        // patient sessions: $filters['patient'] = 'patient_id'
        // doctor sessions: $filters['doctor'] = 'doctor_id'
        // session at date 2022-12-31: $filters['date'] = '2022-12-31'
        // if date key is not set in $filters, only future sessions are returned
        $db = new db_connect();
        $pdo = $db->connection();
        $current_date = date('Y-m-d');    // date('Y-m-d H:i:s');
        $params = [];
        $sql = 'SELECT * FROM Sessions WHERE ';

        if (isset($filters["patient"])) {
            $sql = 'SELECT title, description, start_time, end_time, max_num, doctor_id
                    FROM Appointments
                    INNER JOIN Sessions ON session_id = Sessions.id
                    WHERE patient_id = :patient_id AND ;
                    ';
            $params = ['patient_id' => $filters['patient']];
        } else if (isset($filters["doctor"])) {
            $sql .= 'doctor_id = :doctor_id AND ';
            $params['doctor_id'] = $filters['doctor'];
        }

        if (isset($filters["date"])) {
            $sql .= 'DATE(end_time) = :date;';
            $params['date'] = $filters['date'];
        } else {
            $sql .= 'DATE(end_time) >= :date;';
            $params['date'] = $current_date;
        }

        $stm = $pdo->prepare($sql);
        $stm->execute($params);
        $rows = $stm->fetchAll(PDO::FETCH_OBJ);

        $results = [];
        foreach($rows as $row) {
            $session = new self($row->title, $row->occupied, $row->description, $row->start_time, $row->end_time, $row->doctor_id, $row->max_num, $row->id, $row->doctor_name);
            array_push($results, $session);
        }

        return $results;
    }

    private static function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        if ($d && $d->format('Y-m-d') == $date)
            return $d->format($format);
        $d = DateTime::createFromFormat('d-m-Y', $date);
        if ($d && $d->format('d-m-Y') == $date)
            return $d->format($format);
        $d = DateTime::createFromFormat('Y/m/d', $date);
        if ($d && $d->format('Y/m/d') == $date)
            return $d->format($format);
        $d = DateTime::createFromFormat('d/m/Y', $date);
        if ($d && $d->format('d/m/Y') == $date)
            return $d->format($format);
        return false;
    }

    public static function search_sessions($patient_id, $input = null) { // patient use this method
        // only return session which the patient is not registed yet
        // $input can be doctor name, doctor email, date of session
        $name_pattern = "/^[a-zA-Z ]+$/";
        $input = trim($input);

        $db = new db_connect();
        $pdo = $db->connection();
        $sql = 'SELECT S.id, S.title, S.description, S.start_time, S.end_time, S.max_num, S.occupied, S.doctor_id, U.full_name as doctor_name, A.patient_id as appointementId
                FROM Sessions as S
                LEFT JOIN Appointments as A ON S.id = A.session_id
                INNER JOIN Users as U ON S.doctor_id = U.id
                WHERE S.occupied < S.max_num
                AND DATE(S.end_time) >= :min_date
                AND S.id not in (
                    SELECT session_id
                    FROM Appointments
                    WHERE patient_id = :patient_id
                )
                ';
        
        $params = [
            'patient_id' => $patient_id,
            'min_date'       => date('Y-m-d')
        ];
        
        if ($input && !empty($input)) {
            if ($d = self::validateDate($input)) {
                echo "date validated: $d\n"; 
                $sql .= 'AND DATE(S.end_time) = :exact_date';
                $params['exact_date'] = $d;
            } 
            else if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
                echo "email validated: $d\n"; 
                $sql .= 'AND U.email LIKE :email';
                $params['email'] = $input;
            }
            else if (preg_match($name_pattern, $input)) {
                $sql .= 'AND U.full_name LIKE :full_name';
                $params['full_name'] = $input . "%";
            } else {
                return [];
            }
        }

        $sql .= '
                GROUP BY S.id;';

        $stm = $pdo->prepare($sql);
        $stm->execute($params);
        $rows = $stm->fetchAll(PDO::FETCH_OBJ);

        $results = [];
        foreach($rows as $row) {
            $session = new self($row->title, $row->occupied, $row->description, $row->start_time, $row->end_time, $row->doctor_id, $row->max_num, $row->id, $row->doctor_name);
            array_push($results, $session);
        }

        return $results;
    }
}
