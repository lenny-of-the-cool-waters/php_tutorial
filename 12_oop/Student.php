<?php

require_once 'Person.php';

class Student extends Person {
    public $studentID;
    public function __construct($name, $age, $studentID) {
        $this->studentID = $studentID;
        // Using the parent class' constructor
        parent::__construct($name, $age, null);
    }
}

?>