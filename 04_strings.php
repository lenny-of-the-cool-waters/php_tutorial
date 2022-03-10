<?php

// Create simple string
$hello = "Hello";
$world = "World";

// String concatenation
echo $hello. ' ' .$world. '<br>';
echo "$hello $world <br>";   // Double quotes lets you use variables directly

// String functions
$string = "    Hello world      ";
echo "1 - " . strlen($string) . '<br>' . PHP_EOL;   // Length of string
echo "2 - " . trim($string) . '<br>' . PHP_EOL;     // Remove whitespace from the beginning and end of string
echo "3 - " . ltrim($string) . '<br>' . PHP_EOL;    // Remove whitespace from the beginning of a string
echo "4 - " . rtrim($string) . '<br>' . PHP_EOL;    // Remove whitespace from the end of a string
echo "5 - " . str_word_count($string) . '<br>' . PHP_EOL;   // Count number of words in a string
echo "6 - " . strrev($string) . '<br>' . PHP_EOL;   // Reverse a string
echo "7 - " . strtoupper($string) . '<br>' . PHP_EOL;   // Convert string to uppercase
echo "8 - " . strtolower($string) . '<br>' . PHP_EOL;   // Convert string to lowercase
echo "9 - " . ucfirst('hello') . '<br>' . PHP_EOL;  // Convert first character into uppercase
echo "10 - " . lcfirst('HELLO') . '<br>' . PHP_EOL;     // Convert first character into lowercase
echo "11 - " . ucwords('hello world') . '<br>' . PHP_EOL;   // Convert first character per word into uppercase
echo "12 - " . strpos($string, 'world') . '<br>' . PHP_EOL; // Check position when word first appears
echo "13 - " . stripos($string, 'world') . '<br>' . PHP_EOL;    // Similar to strpos but case-insensitive
echo "14 - " . substr($string, 8) . '<br>' . PHP_EOL;   // Create substring from given index
echo "15 - " . str_replace('World', 'PHP', $string) . '<br>' . PHP_EOL; // replace a substring in a string
echo "16 - " . str_ireplace('world', 'PHP', $string) . '<br>' . PHP_EOL;    // Similar to str_replace but case-insensitive

$invoiceNumber = 100;
$invoiceNumber2 = 123456;
echo str_pad($invoiceNumber, 8, '0', STR_PAD_LEFT) . '<br>' . PHP_EOL;  // Add padding text at the start
echo str_pad($invoiceNumber2, 8, '0', STR_PAD_LEFT) . '<br>' . PHP_EOL; // Add padding text at the end
echo str_repeat('Hello', 2) . '<br>' . PHP_EOL; // Repeat string for a given number of times

// Multiline text and line breaks
$longText = "
  Hello, my name is Zura
  I am 27,
  I love my daughter
";
echo $longText . '<br>' . PHP_EOL;
echo nl2br($longText) . '<br>' . PHP_EOL;   // Reserves line breaks in text

// Multiline text and reserve html tags
$longText = "
  Hello, my name is <b>Zura</b>
  I am <b>27</b>,
  I love my daughter
";
echo "1 - " . $longText . '<br>';
echo "2 - " . nl2br($longText) . '<br>';
echo "3 - " . htmlentities($longText) . '<br>' . PHP_EOL;   // reserves html tags
echo "4 - " . nl2br(htmlentities($longText)) . '<br>' . PHP_EOL;
echo "5 - " . html_entity_decode(htmlentities($longText)) . '<br>' . PHP_EOL;   // Convert HTML entities to their corresponding characters
echo "6 - " . htmlspecialchars($longText) . '<br>' . PHP_EOL;   //Convert special characters to HTML entities

// https://www.php.net/manual/en/ref.strings.php