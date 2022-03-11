<?php

namespace Example;
class Person {
    public $name;
    public $age;
    public $gender;

    public function __construct($name, $age, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function message() {
        return 'My name is '.$this->name.', I am '.$this->gender.', and I am '.$this->age.' years old';
    }   
}

class Student extends Person {
    public $course;

    public function __construct($name, $age, $gender,$course) {
        $this->course = $course;
        parent::__construct($name, $age, $gender );
    }
}

?>