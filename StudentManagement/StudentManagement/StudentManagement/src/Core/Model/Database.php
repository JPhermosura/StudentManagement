<?php

namespace Hermosura\StudentManagement\Core\Model;
use mysqli;

class Database {
    protected $conn;
    public function __construct()
    {
        $host ='localhost';
        $db = 'reset';
        $user = 'root';
        $pass = '';
        $db = "oop2";
        //mysqli connection
        $this-> conn = new mysqli($host, $user, $pass, $db);
        if ($this->conn->connect_error) { 
            die("connection to database failed: " . $this->conn->connect_error);
        }
    }
}