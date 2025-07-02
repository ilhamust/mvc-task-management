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
    $view = '../app/views/dashboard/index.php';
    require_once '../app/views/layouts/app.php';
  }
}
