<?php
require_once __DIR__ . '/../../core/Model.php';

class Admin extends Model {
    public function getByUsername($username){
        $stmt= $this->db->prepare('SELECT * FROM admins WHERE username = :u');
        $stmt->execute(['u'=> $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}