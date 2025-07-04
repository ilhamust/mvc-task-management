<?php

class Tasks extends Model {
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function insertTask($title, $description, $deadline, $importance) {
    $status = 'pending'; // default saat task dibuat

    // Tentukan urgency & quadrant sebelum insert
    $urgency = $this->determineUrgency($deadline);
    $quadrant = $this->determineQuadrant($importance, $urgency);

    $stmt = $this->db->prepare("INSERT INTO tasks (title, description, deadline, importance, quadrant, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $description, $deadline, $importance, $quadrant, $status);
    $stmt->execute();
    $stmt->close();
}


public function getActiveTasks() {
    $sql = "SELECT * FROM tasks WHERE status='pending' 
            ORDER BY FIELD(quadrant, 'Quadrant 1', 'Quadrant 2', 'Quadrant 3', 'Quadrant 4'), deadline ASC";
    $result = mysqli_query($this->db, $sql);

    $tasks = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Tidak perlu menentukan quadrant di sini karena sudah ada di DB
            $tasks[] = $row;
        }
    } else {
        echo "Query Error: " . mysqli_error($this->db);
    }

    return $tasks;
}


   public function getCompletedTasks() {
    $sql = "SELECT * FROM tasks WHERE status='completed'
            ORDER BY FIELD(quadrant, 'Quadrant 1', 'Quadrant 2', 'Quadrant 3', 'Quadrant 4'), deadline ASC";
    $result = mysqli_query($this->db, $sql);

    $tasks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tasks[] = $row;
    }

    return $tasks;
}


    private function determineUrgency($deadline) {
    $today = new DateTime();
    $deadlineDate = new DateTime($deadline);
    $interval = $today->diff($deadlineDate);
    $daysDiff = (int)$interval->format('%r%a');

    if ($daysDiff <= 2) {
        return 'Mendesak';
    } else {
        return 'Tidak Mendesak';
    }
}


    private function determineQuadrant($importance, $urgency) {
    $importance = strtolower($importance); // normalize
    if ($importance == 'penting' && $urgency == 'Mendesak') {
        return 'Quadrant 1'; // Important & Urgent
    } elseif ($importance == 'penting' && $urgency == 'Tidak Mendesak') {
        return 'Quadrant 2'; // Important & Not Urgent
    } elseif ($importance == 'tidak penting' && $urgency == 'Mendesak') {
        return 'Quadrant 3'; // Not Important & Urgent
    } else {
        return 'Quadrant 4'; // Not Important & Not Urgent
    }
}

public function getTaskById($id) {
  $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $task = $result->fetch_assoc();
  $stmt->close();
  return $task;
}

public function updateTask($id, $title, $description, $deadline, $importance) {
    // Tentukan ulang urgency & quadrant
    $urgency = $this->determineUrgency($deadline);
    $quadrant = $this->determineQuadrant($importance, $urgency);

    $stmt = $this->db->prepare("UPDATE tasks SET title=?, description=?, deadline=?, importance=?, quadrant=? WHERE id=?");
    $stmt->bind_param("sssssi", $title, $description, $deadline, $importance, $quadrant, $id);
    $stmt->execute();
    $stmt->close();
}


public function deleteTask($id) {
  $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
}
public function markAsCompleted($id) {
    $stmt = $this->db->prepare("UPDATE tasks SET status = 'completed' WHERE id = ?");
    if (!$stmt) {
        die("Prepare failed: " . $this->db->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

public function markAsActive($id) {
  $stmt = $this->db->prepare("UPDATE tasks SET status = 'pending' WHERE id = ?");
  if (!$stmt) {
      die("Prepare failed: " . $this->db->error);
  }
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
}

public function getAllTasks() {
    $sql = "SELECT * FROM tasks ORDER BY FIELD(quadrant, 'Quadrant 1', 'Quadrant 2', 'Quadrant 3', 'Quadrant 4'), deadline ASC";
    $result = mysqli_query($this->db, $sql);

    $tasks = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tasks[] = $row;
        }
    } else {
        echo "Query Error: " . mysqli_error($this->db);
    }

    return $tasks;
}

}
