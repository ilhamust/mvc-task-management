<?php

abstract class Controller {
    abstract public function index();
    public function model($model) {
        require_once __DIR__ . "/../models/" . $model . ".php";
        return new $model;
    }

    public function view($view, $data = []) {
        require_once __DIR__ . "/../views/" . $view . ".php";
    }
}
