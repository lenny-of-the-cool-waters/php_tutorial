<?php
// Magic constants

echo 'Current Directory: ' .__DIR__. '<br>';
echo 'Current File: ' .__FILE__. '<br>';
echo 'Current Line: ' .__LINE__. '<br>';

// Create directory
/* var_dump(mkdir('./test', 0777));
echo '<br>';
 */
// Rename directory
/* var_dump(rename('test', 'newtest'));
echo '<br>'; */

// Delete directory
/* var_dump(rmdir('newtest'));
echo '<br>'; */

// Read files and folders inside directory
$files = scandir('./');
echo '<pre>'; 
echo var_dump($files);
echo '</pre>';

// file_get_contents, file_put_contents
echo '<pre>';
echo file_get_contents('lorem.txt') .'<br>';
echo '</pre>';
file_put_contents('sample.txt', 'Sample file content');

// file_get_contents from URL
$usersJSON = file_get_contents('https://jsonplaceholder.typicode.com/users');
$users = json_decode($usersJSON);
echo '<pre>';
echo var_dump($users);
echo '</pre>';

// https://www.php.net/manual/en/book.filesystem.php
// file_exists
var_dump(file_exists('sample.txt'));
echo '<br>';
// is_dir
var_dump(is_dir('test'));
echo '<br>';
// filemtime
var_dump(filemtime('sample.txt'));
echo '<br>';
// filesize
var_dump(filesize('sample.txt'));
echo '<br>';
// disk_free_space
var_dump(disk_free_space('/'));
echo '<br>';
// delete file
unlink('sample.txt');