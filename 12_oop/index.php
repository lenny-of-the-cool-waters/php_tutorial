<?php

require 'namespaceExample.php';
require 'Person.php';
require 'Student.php';
// What is class and instance

// Create Person class in Person.php
$lenny = new Student('Lenny', 23, 'SCM211-0350/2016');
echo '<pre>';
var_dump($lenny);
echo '</pre>';

$leonard = new Example\Student('Leonard', 23, 'male', 'computer science');
echo '<pre>';
var_dump($leonard);
echo '</pre>';

?>