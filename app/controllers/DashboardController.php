<?php
class DashboardController extends Controller {
  public function index() {
    $title = 'Dashboard - Eisenhower App';
    $pageTitle = 'Dashboard';
    $pageSubtitle = 'Kelola tugas dengan metode Eisenhower Matrix';
        $view = '../app/views/layouts/dashboard/index.php';
        require_once '../app/views/layouts/app.php';
  }
}
