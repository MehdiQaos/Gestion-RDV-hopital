<?php

include __DIR__ . 'autoloader.php';

class Session {
    private $id,
            $title,
            $description,
            $start_date,
            $end_date,
            $max_num;
    private $filter = "FUTURE_SESSIONS";
    
    public function add_session() {

    }

    public function view_sessions() {
        // $pdo = db_connect();
        $pdo = new PDO();
        $sql = 'SELECT * FROM Sessions';
        if ($this->filter == "FUTURE_SESSIONS") {
            $current_date = date('Y-m-d H:i:s');
            $sql .= 
        }
        $pdo->prepare($sql);
    }
}