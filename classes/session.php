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

    public function search_session() {
        // search by what?
    }
}