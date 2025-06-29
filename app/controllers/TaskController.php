<?php
class TaskController extends Controller {
  public function index() {
    $title = 'Tasks - Eisenhower App';
    $pageTitle = 'Daftar Tugas';
    $pageSubtitle = 'Kelola dan lihat semua tugas Anda';
    $view = '../app/views/tasks/index.php'; // Sesuaikan path view
    require_once '../app/views/layouts/app.php';
  }
  
    public function store() {
    require_once '../app/models/Tasks.php';
    $taskModel = new Tasks();

    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $importance = $_POST['importance'];

    $taskModel->insertTask($title, $description, $deadline, $importance);

    header('Location: /eisenhower-app/public/tasks');
  }
}
