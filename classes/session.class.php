<?php

class Session {
    private $id,
            $title,
            $description,
            $start_date,
            $end_date,
            $max_num;
    private $filter;
    
    public function add_session() {

    }

    public function view_sessions() {
        $pdo = DB();
        $sql = 'SELECT * FROM Sessions;';
        $pdo->prepare($sql);
    }
}