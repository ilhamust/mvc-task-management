<?php

class Task {
    private $db;
    private $table = 'tasks';

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Ambil semua task
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $result = mysqli_query($this->db, $query);

        $tasks = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tasks[] = $row;
            }
        }

        return $tasks;
    }

    // Ambil satu task by id
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = mysqli_prepare($this->db, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

// Tambah task
public function create($title, $description, $important, $urgent, $status) {
    $query = "INSERT INTO " . $this->table . " (title, description, important, urgent, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($this->db, $query);
    mysqli_stmt_bind_param($stmt, "ssiis", $title, $description, $important, $urgent, $status);
    return mysqli_stmt_execute($stmt);
}

// Update task
public function update($id, $title, $description, $important, $urgent, $status) {
    $query = "UPDATE " . $this->table . " SET title = ?, description = ?, important = ?, urgent = ?, status = ? WHERE id = ?";
    $stmt = mysqli_prepare($this->db, $query);
    mysqli_stmt_bind_param($stmt, "ssiisi", $title, $description, $important, $urgent, $status, $id);
    return mysqli_stmt_execute($stmt);
}


    // Hapus task
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = mysqli_prepare($this->db, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}