<?php
require_once('database.php');
require_once('../models/Product.php');


// prepare a statement to select all products
$stmt = $conn->prepare('SELECT * FROM product');

// execute the statement and fetch all results into an array
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// loop through the results and output the names
foreach ($results as $result) {
  $product = new Product();
  $product->setId($result['id']);
  $product->setName($result['name']);
  $product->setCategory($result['category']);
  $product->setDescription($result['description']);
  $product->setPrice($result['price']);
  $product->setImgUri($result['img_uri']);
    echo $result['name'] . '<br>';

    echo $product->getDescription();
}

// close the connection
$pdo = null;
?>