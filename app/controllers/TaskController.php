<?php
class TaskController extends Controller {
    public function index() {
        $taskModel = $this->model('Task');
        $tasks = $taskModel->getAll();
        $this->view('tasks/index', ['tasks' => $tasks]);
    }
}
