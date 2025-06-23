<?php

require_once '../app/interfaces/TaskInterface.php';

class Task extends Model implements TaskInterface {

    public function getAll() {
        $query = "SELECT * FROM tasks ORDER BY created_at DESC";
        $result = $this->db->query($query);

        $tasks = [];
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function getById($id) {
        $id = $this->db->real_escape_string($id);
        $query = "SELECT * FROM tasks WHERE id = $id LIMIT 1";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function create($data) {
        $title = $this->db->real_escape_string($data['title']);
        $description = $this->db->real_escape_string($data['description']);
        $urgent = (int)$data['is_urgent'];
        $important = (int)$data['is_important'];

        $query = "INSERT INTO tasks (title, description, is_urgent, is_important)
                  VALUES ('$title', '$description', $urgent, $important)";
        return $this->db->query($query);
    }

    public function update($id, $data) {
        $id = $this->db->real_escape_string($id);
        $title = $this->db->real_escape_string($data['title']);
        $description = $this->db->real_escape_string($data['description']);
        $urgent = (int)$data['is_urgent'];
        $important = (int)$data['is_important'];

        $query = "UPDATE tasks SET title='$title', description='$description', is_urgent=$urgent, is_important=$important WHERE id=$id";
        return $this->db->query($query);
    }

    public function delete($id) {
        $id = $this->db->real_escape_string($id);
        $query = "DELETE FROM tasks WHERE id = $id";
        return $this->db->query($query);
    }
}
