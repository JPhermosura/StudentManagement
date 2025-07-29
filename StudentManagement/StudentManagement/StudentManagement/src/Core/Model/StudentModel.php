<?php

namespace Hermosura\StudentManagement\Core\Model;

interface Crud {
    public function create();
    public function read();
    public function update();
    public function delete();
}

class StudentModel implements Crud {
    public $id;
    public $fullname;
    public $yearlevel;
    public $course;
    public $section;

    public function __construct()
    {
        $this->id = "";
        $this->fullname = "";
        $this->yearlevel = "";
        $this->course = "";
        $this->section = "";
    }

    public function displayInfo() {
        echo "id :" . $this->id . "\n";
        echo "Name :" . $this->fullname . "\n";
        echo "Year Level :" . $this->yearlevel . "\n";
        echo "Course :" . $this->course . "\n";
        echo "Section :" . $this->section . "\n";
    }

    public function create() {
       
    }

    public function read() {
        echo "Reading Student Data...\n";
        $this->displayInfo();
    }

    public function update() {
        $this->id = "1";
        $this->fullname = "Lolita Garcia";
        $this->yearlevel = "2";
        $this->course = "BSIT";
        $this->section = "B";

        echo "Student record has been updated.\n";
        $this->displayInfo();
    }

    public function delete() {
        $this->id = "";
        $this->fullname = "";
        $this->yearlevel = "";
        $this->course = "";
        $this->section = "";

        echo "Student record has been deleted.\n";
    }
}
