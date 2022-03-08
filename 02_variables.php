<?php

// What is a variable
// Variables are reserved locations in memory containing an identifier/name and a value

// PHP is a loosely typed language so it isn't necessary to declare data types
// Variable types
/*
    String
    Integer
    Float
    Boolean
    Null
    Array
    Object
    Resource
*/

// Declare variables
$name = "Lenny";    //String variable
$age = 23;  //Integer variable
$float_example = 10.222;    //Float or double variable
$is_learning = true;    //Boolean variable
$is_giving_up = null;   //Null variable
$example_array = ["This", "is","an","array"];    //Array variable

// Print the variables. Explain what is concatenation
echo("My name is " .$name. " and I am " .$age. " years old");

// Print types of the variables
echo "<br>" .gettype($name);
echo "<br>" .gettype($age);

// Print the whole variable
echo '<br>';
var_dump($name, $age, $is_learning);   //Returns the datatype, variable size, and variable value

// Variable checking functions
is_string($name);
is_int($age);
is_integer($age);
is_numeric("12345");
is_bool($is_learning);
is_array($example_array);


// Check if variable is defined
echo '<br>';
var_dump(isset($name));
var_dump(isset($name2));
echo '<br>';

// Constants
// Similar to variables but cannot be mutated after declaration
define('country_of_birth', 'Kenya');
echo "$name was born in " .country_of_birth;

// Using PHP built-in constants
echo '<br>'.SORT_ASC.'<br>';
echo PHP_INT_MAX.'<br>';
?>