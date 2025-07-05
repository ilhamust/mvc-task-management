<?php
class TaskController extends Controller {
  
  public function index() {
    session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: /eisenhower-app/public/login');
  exit;
}
$username = $_SESSION['username'];   

    $title = 'Tasks - Eisenhower App';
    $pageTitle = 'Daftar Tugas';
    $pageSubtitle = 'Kelola dan lihat semua tugas Anda';
    $view = '../app/views/tasks/index.php'; 

    $taskModel = new Tasks();
    $activeTasks = $taskModel->getActiveTasks();
    $completedTasks = $taskModel->getCompletedTasks(); 
    $view = '../app/views/tasks/index.php';
    require_once '../app/views/layouts/app.php';
  }
  
    public function store() {
    $taskModel = new Tasks();

    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $importance = $_POST['importance'];

    $taskModel->insertTask($title, $description, $deadline, $importance);

    header('Location: /eisenhower-app/public/tasks');
  }

  public function update() {
  $taskModel = new Tasks();

  $id = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $deadline = $_POST['deadline'];
  $importance = $_POST['importance'];

  $taskModel->updateTask($id, $title, $description, $deadline, $importance);

  header('Location: /eisenhower-app/public/tasks');
}

public function delete($id) {
  $taskModel = new Tasks();
  $taskModel->deleteTask($id);

  header('Location: /eisenhower-app/public/tasks');
}
public function complete() {
  $taskId = $_POST['id'];
  $taskModel = $this->model('Tasks');
  $taskModel->markAsCompleted($taskId);

  header('Location: /eisenhower-app/public/tasks');
  exit;
}
public function uncomplete() {
  $taskId = $_POST['id'];
  $taskModel = $this->model('Tasks');
  $taskModel->markAsActive($taskId);

  header('Location: /eisenhower-app/public/tasks');
  exit;
}


}
