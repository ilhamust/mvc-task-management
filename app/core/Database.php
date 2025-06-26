<?php

class Database {
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "eisenhower_db";
    private $connect;

    public function __construct() {
        $this->connect = mysqli_connect(
            $this->server,
            $this->username,
            $this->password,
            $this->dbname
        );

        if (!$this->connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->connect;
    }
}
