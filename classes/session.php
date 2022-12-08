<?php

include 'autoloader.php';

class Session {

    public function add_session($title, $description, $start_date, $end_date, $doctor_id, $max_num) {
        $db = new db_connect();
        $pdo = $db->connection();
        $sql = 'INSERT INTO Sessions (title, description, start_time, end_time, doctor_id, max_num)
                VALUES (:title, :description, :start_time, :end_time, :doctor_id, :max_num);
                ';
        $params = [
            'title' => $title,
            'description' => $description,
            'start_time' => $start_date,
            'end_time' => $end_date,
            'doctor_id' => $doctor_id,
            'max_num' => $max_num
        ];
        
        $stm = $pdo->prepare($sql);
        return $stm->execute($params);
    }

    public function edit_session($id, $title, $description, $start_time, $end_time, $doctor_id, $max_num) {
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
        return $stm->execute($params);
    }
    
    public function cancel_session($id) {
        if ($id == null)
            return false;
        $db = new db_connect();
        $pdo = $db->connection();
        $sql = 'DELETE FROM Sessions
                WHERE id = :session_id;
                ';
        
        $stm = $pdo->prepare($sql);
        return $stm->execute(['session_id' => $id]);
    }

    public function view_sessions($filters = []) {
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
            $sql .= 'DATE(end_time) = :date;'; // test if DATE(datetime) return just date
            $params['date'] = $filters['date'];
        } else {
            $sql .= 'DATE(end_time) >= :date;';
            $params['date'] = $current_date;
        }
        $stm = $pdo->prepare($sql);
        $stm->execute($params);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    private function validateDate($date, $format = 'Y-m-d') {
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

    public function search_session($patient_id, $input) {
        // $input can be doctor name, doctor email, date of session
        $name_pattern = "/^[a-zA-Z ]+$/";
        $input = trim($input);

        $db = new db_connect();
        $pdo = $db->connection();
        $sql = 'SELECT S.id, S.title, S.description, S.start_time, S.end_time, S.max_num, S.occupied, S.doctor_id, U.full_name as doctor_name
                FROM Sessions as S
                INNER JOIN Appointments as A ON S.id = A.session_id
                INNER JOIN Users as U ON S.doctor_id = U.id
                WHERE A.patient_id = :patient_id
                ';
        $params = ['patient_id' => $patient_id];

        if ($d = $this->validateDate($input)) {
            $sql .= 'AND DATE(S.end_time) = :date;';
            $params['date'] = $d;
        }
        else if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $sql .= 'AND U.email LIKE :email;';
            $params['email'] = $input;
        }
        else if (preg_match($name_pattern, $input)) {
            $sql .= 'AND U.full_name LIKE :full_name;';
            $params['full_name'] = "%" . $input . "%";
        } else {
            return null;
        }
        
        $stm = $pdo->prepare($sql);
        $stm->execute($params);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}