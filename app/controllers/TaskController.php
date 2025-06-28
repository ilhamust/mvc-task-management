<?php

class TaskController extends Controller {
    private $taskModel;

    public function __construct() {
        $this->taskModel = $this->model('Task');
    }

    // Menampilkan semua task
    public function index() {
        $tasks = $this->taskModel->getAll();
        $this->view('tasks/index', ['tasks' => $tasks]);
    }

    // Menampilkan form tambah task
    public function create() {
        $this->view('tasks/create');
    }

    // Menyimpan task baru
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $important = $_POST['important'];
            $urgent = $_POST['urgent'];
            $status = $_POST['status'];

            $this->taskModel->create($title, $description, $important, $urgent, $status);
            header('Location: /task');
        }
    }

    // Menampilkan form edit task
    public function edit($id) {
        $task = $this->taskModel->getById($id);
        $this->view('tasks/edit', ['task' => $task]);
    }

    // Update task
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $important = $_POST['important'];
            $urgent = $_POST['urgent'];
            $status = $_POST['status'];

            $this->taskModel->update($id, $title, $description, $important, $urgent, $status);
            header('Location: /task');
        }
    }

    // Delete task
    public function delete($id) {
        $this->taskModel->delete($id);
        header('Location: /task');
    }
}
