<?php


class Popup extends Model {


    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM popups ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM popups WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO popups (title,message,is_active) VALUES (:title, :message, :is_active)");
        return $stmt->execute([
            'title' => $data['title'],
            'message' => $data['message'],
            'is_active' => $data['is_active']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE popups SET title = :title, message = :message, is_active = :is_active WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'message' => $data['message'],
            'is_active' => $data['is_active']
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM popups WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}