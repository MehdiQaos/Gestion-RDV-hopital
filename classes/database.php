<?php
    class Database {
        private $_instance = null;

        public function __construct() {
            $dsn = "mysql:host=" . Config::get('mysql/host') . "dbname=" . Config::get('mysql/db_name');
            $user = Config::get('mysql/username');
            $password = Config::get('mysql/password');
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            try {
                $dbh = new PDO($dsn, $user, $password, $options);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        
        public function getInstance() {
            if(!isset(self::$_instance))
                self::$_instance = new Database();
            
            return self::$_instance;
        }
    }