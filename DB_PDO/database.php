<?php

namespace database {
    class DB_PDO {
        private $conn;
        private static $instance;

        private function __construct(array $config) {
            $dsn = $config['dsn'] . ';dbname=' . $config['database'];
            $this->conn = new \PDO($dsn, $config['user'], $config['password']);
        }

        public static function getInstance(array $config) {
            if(!static::$instance) {
                static::$instance = new DB_PDO($config);
            }
            return static::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
}