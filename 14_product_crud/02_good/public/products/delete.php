<?php

require_once '../../database.php';
require_once '../../functions.php';

$id = $_POST['id'] ?? null;
if(!$id){ header('Location: index.php'); }

$statement = $pdo->prepare("SELECT * FROM products WHERE id=:id");
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);
if($product['image']) {
    unlink($product['image']);
    echo $product['image'];
}

$delete_statement = $pdo->prepare('DELETE FROM products WHERE id=:id');
$delete_statement->bindValue(':id', $id);
$delete_statement->execute();

// header('Location: index.php');

?>`