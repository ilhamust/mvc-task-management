<?php
class HomeController extends Controller {
  public function index() {
        $view = '../app/views/tasks/index.php';
        require_once '../app/views/layouts/main.php';
  }
}
