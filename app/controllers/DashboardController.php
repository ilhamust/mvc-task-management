<?php
class DashboardController extends Controller {
  public function index() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
      header('Location: /eisenhower-app/public/login');
      exit;
    }

    $username = $_SESSION['username'];
    $title = 'Dashboard - Eisenhower App';
    $pageTitle = 'Dashboard';
    $pageSubtitle = 'Kelola tugas dengan metode Eisenhower Matrix';

    $taskModel = new Tasks();
    $allTasks = $taskModel->getAllTasks(); 
    $activeTasks = $taskModel->getActiveTasks();
    $completedTasks = $taskModel->getCompletedTasks();

    $totalTasks = count($allTasks);
    $pendingTasks = count($activeTasks);
    $completedTasksCount = count($completedTasks);

    $tasks = [
      'quadrant1' => [],
      'quadrant2' => [],
      'quadrant3' => [],
      'quadrant4' => []
    ];

    foreach ($activeTasks as $task) {
      switch ($task['quadrant']) {
        case 'Quadrant 1':
          $tasks['quadrant1'][] = $task;
          break;
        case 'Quadrant 2':
          $tasks['quadrant2'][] = $task;
          break;
        case 'Quadrant 3':
          $tasks['quadrant3'][] = $task;
          break;
        case 'Quadrant 4':
          $tasks['quadrant4'][] = $task;
          break;
      }
    }

    $view = '../app/views/dashboard/index.php';
    require_once '../app/views/layouts/app.php';
  }
}
