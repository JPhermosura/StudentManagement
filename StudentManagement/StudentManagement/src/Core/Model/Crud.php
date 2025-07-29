<?php 

namespace Hermosura\StudentManagement\Core\Model;

interface Crud {
    public function create();
    public function read();
    public function update();
    public function delete();
}