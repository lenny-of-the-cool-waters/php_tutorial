<?php

// Declaring numbers
$a = 5;
$b = 4;
$c = 1.2;

// Arithmetic operations
// Note that operations between floats and ints always results in floats
echo ($a + $b) * $c . '<br>';   //Sum and product with brackets
echo $a - $b . '<br>';  // Difference
echo $a * $b . '<br>';  // Product
echo $a / $b . '<br>';  // Division
echo $a % $b . '<br>';  // Modulo

// Assignment with math operators
//$a += $b; echo $a.'<br>'; // $a = 9
//$a -= $b; echo $a.'<br>'; // $a = 1
//$a *= $b; echo $a.'<br>'; // $a = 20
//$a /= $b; echo $a.'<br>'; // $a = 1.25
//$a %= $b; echo $a.'<br>'; // $a = 1

// Increment operator
echo $a++ . '<br>'; //Outputs $a then increments it
echo ++$a . '<br>'; // Increments $a then outputs it

// Decrement operator
echo $a-- . '<br>'; // Outputs $a then decrements it
echo --$a . '<br>'; // Decreases $a then outputs it

// Number checking functions
is_float(1.25); // true
is_integer(3.4); // false
is_numeric("3.45"); // true
is_numeric("3g.45"); // false

// Conversion
$strNumber = '12.34';
$number = (float)$strNumber; // Use floatval(), (int), intval()
var_dump($number);
echo '<br>';

// Number functions
echo "abs(-15) " . abs(-15) . '<br>';   // Absolute value
echo "pow(2,  3) " . pow(2, 3) . '<br>';    // Exponents
echo "sqrt(16) " . sqrt(16) . '<br>';   // Square roots
echo "max(2, 3) " . max(2, 3) . '<br>'; // Get maximum from arguments
echo "min(2, 3) " . min(2, 3) . '<br>'; // Get minimum from arguments
echo "round(2.4) " . round(2.4) . '<br>';   // Round float to nearest int
echo "round(2.6) " . round(2.6) . '<br>';   
echo "floor(2.6) " . floor(2.6) . '<br>';   // Round float to nearest larger int
echo "ceil(2.4) " . ceil(2.4) . '<br>'; // Round float to nearest smaller int

// Formatting numbers
$number = 123456789.12345;
echo number_format($number, 2, '.', ',') . '<br>';
//The arguments are <number_to_format>, <decimal_places>, <decimal_symbol>, <thousands_symbol>

// https://www.php.net/manual/en/ref.math.php
