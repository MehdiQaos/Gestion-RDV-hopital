<?php

include __DIR__ . 'classes/db_connect.php';

class Session {

    public function edit_session($id, $title, $description, $start_date, $end_date, $doctor_id, $max_num) {
        $pdo = new db_connect;
        $sql = 'UPDATE Sessions
                SET title = :title, description = :description, start_date = :start_date, end_date = :end_date, doctor_id = :doctor_id, max_num = :max_num
                WHERE id = :id;
                ';

        $params = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'doctor_id' => $doctor_id,
            'max_num' => $max_num
        ];

        $stm = $pdo->prepare($sql);
        return $stm->execute($params);
    }
    
    public function add_session($title, $description, $start_date, $end_date, $doctor_id, $max_num) {
        $pdo = new db_connect;
        $sql = 'INSERT INTO Sessions (title, description, start_date, end_date, doctor_id, max_num)
                VALUES (:title, :description, :start_date, :end_date, :doctor_id, :max_num);
                ';
        $params = [
            'title' => $title,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'doctor_id' => $doctor_id,
            'max_num' => $max_num
        ];
        
        $stm = $pdo->prepare($sql);
        return $stm->execute($params);
    }

    public function cancel_session($id) {
        if ($id == null)
            return false;
        $pdo = new db_connect;
        $sql = 'DELETE FROM Sessions
                WHERE id = :session_id;
                ';
        
        $stm = $pdo->prepare($sql);
        return $stm->execute(['session_id' => $id]);
    }

    public function view_sessions($filters) {
        $pdo = new db_connect;
        $current_date = date('Y-m-d');    // date('Y-m-d H:i:s');
        $params = [];
        if (isset($filters["patient"])) {
            $sql = 'SELECT title, description, start_time, end_time, max_num, doctor_id
                    FROM Appointments
                    INNER JOIN Sessions ON session_id = Sessions.id
                    WHERE patient_id = :patient_id;
                    ';                                  // TODO: filter by date too?
            $params = ['patient_id' => $filters['patient']];
        } else {
            $sql = 'SELECT * FROM Sessions WHERE ';
            if (isset($filters["doctor"])) {
                $sql .= 'doctor_id = :doctor_id AND ';
            }
            if (isset($filters["date"])) {
                $sql .= 'DATE(end_time) = :date;'; // test if DATE(datetime) return just date
                $params['date'] = $filters['date'];
            } else {
                $sql .= 'DATE(end_time) > :date;';
                $params['date'] = $current_date;
            }
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