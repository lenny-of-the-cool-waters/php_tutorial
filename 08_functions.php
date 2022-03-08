<?php

// Function which prints "Hello I am Zura"
function hello() {
    echo "Hello I am Zura <br>";
}
hello();

// Function with argument
$name = "Lenny";
function helloWithName($name) {
    echo "Hello, I am $name <br>";
}
helloWithName($name);

// Create sum of two functions
function sum($a, $b) {
    return ($a + $b);
}
echo sum(4, 5);
echo '<br>';

// Create function to sum all numbers using ...$nums
function sumNums(...$nums) {
    $sum = 0;
    foreach($nums as $x) {
        $sum += $x;
    }

    return $sum;
}
echo sumNums(1,2,3,4,5);
echo '<br>';

// Arrow functions
function sumNumsArrow(...$nums) {
    return array_reduce($nums, fn($sum, $current) => $sum + $current);
}
echo sumNumsArrow(1,2,3,4,5);
echo '<br>';
?>