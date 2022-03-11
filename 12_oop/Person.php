<?php

class Person {
    public string $name;
    public int $age;
    private ?float $salary;     // private properties only accessible within the class

    static int $counter = 0;    // Static properties may be called without instantiating the class
    
    // Constructor function used to initialize instances of a class
    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        self::$counter++;
    }

    public function getSalary() {
        return $this-> salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public static function getCounter() {
        return self::$counter;
    }
}

?>