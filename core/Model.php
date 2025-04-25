<?php

class Model {
    protected $db;

    public function __construct() {
    
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=utf8',
            DB_HOST, DB_PORT, DB_NAME
        );

        try {
            $this->db = new PDO($dsn, DB_USER, DB_PASS);
            // Throw exceptions on errors
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Stop execution if the connection fails, and show the error
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}
