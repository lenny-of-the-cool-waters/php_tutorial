<?php

// CURL stands for Client URL and is used to get/send data using urls

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.
$resource = curl_init($url);    // Creating a resource variable
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);   // Setting curl options
$result = curl_exec($resource);     // Executing cURL action
$info = curl_getinfo($resource);    // Getting information about cURL action
$status = curl_getinfo($resource, CURLINFO_HTTP_CODE);

echo '<pre>';
echo $result .'<br><br>';
var_dump($info);
echo '<br><br>';
var_dump($status);
echo '</pre>';

curl_close($resource);      // End cURL actions

// Get response status code

// set_opt_array

// Post request
$resource = curl_init();
$user = [
    'name' => 'John Doe',
    'username' => 'John',
    'email' => 'john@example.com'
];
curl_setopt_array($resource, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['content-type: application.json'],
    CURLOPT_POSTFIELDS => json_encode($user)
]);
$post_result = curl_exec($resource);
curl_close($resource);
echo '<pre>';
echo $post_result;
echo '</pre>';