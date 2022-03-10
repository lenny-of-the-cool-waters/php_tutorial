<?php

// What is class and instance

// Create Person class in Person.php
class Person {
    public $first_name;
    public $surname;
    private $age;

    public function __construct($first_name, $surname) {
        $this->first_name = $first_name;
        $this->surname = $surname;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getAge() {
        return ($this->age);
    }
}

// Create instance of Person
$lenny = new Person('Lenny', 'Gith');

echo '<pre>';
var_dump($lenny);
echo '</pre>';
/* $lenny->first_name = 'Lenny';
$lenny->surname = 'Gith';
$age->age = 23; */

// Using setter and getter
$lenny->setAge(23);
echo '<br> Age changed to ' .$lenny->getAge();