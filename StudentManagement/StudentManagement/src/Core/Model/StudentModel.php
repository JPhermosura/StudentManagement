<?php
namespace Hermosura\StudentManagement\Core\Model;

use Hermosura\StudentManagement\Core\Model\Database;

interface Crud {
    public function create();
    public function read();
    public function update();
    public function delete();
}

class StudentModel implements Crud {
    public $id;
    public $fullname;
    public $course;
    public $yearlevel;
    public $section;

    public function __construct() {
        $this->id = "";
        $this->fullname = "";
        $this->course = "";
        $this->yearlevel = "";
        $this->section = "";
    }

    public function displayInfo() {
        echo "ID: " . $this->id . "\n";
        echo "Name: " . $this->fullname . "\n";
        echo "Year Level: " . $this->yearlevel . "\n";
        echo "Course: " . $this->course . "\n";
        echo "Section: " . $this->section . "\n";
    }

    public function create() {
        $db = new Database();
        $stmt = $db->conn->prepare("INSERT INTO students (fullname, course, year_level, section) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->fullname, $this->course, $this->yearlevel, $this->section);
        $stmt->execute();
        echo "Student record has been created.\n";
        $this->displayInfo();
    }

    public function read() {
        $db = new Database();
        $query = "SELECT * FROM students";
        $result = $db->conn->query($query);
        $students = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }

        return $students;
    }

    public function update() {
    $db = new Database();
    $stmt = $db->conn->prepare("UPDATE students SET fullname = ?, course = ?, year_level = ?, section = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $this->fullname, $this->course, $this->yearlevel, $this->section, $this->id);
    $stmt->execute();

    echo "Student record has been updated.\n";
    $this->displayInfo();
}


    public function delete() {
        $db = new Database();
        $stmt = $db->conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();

        echo "Student record has been deleted.\n";
        $this->displayInfo();
    }
}
