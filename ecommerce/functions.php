<?php

//require sql connection
 require('database/DBconnection.php');
 
 //DBconnection object
$db = new DBconnection();

//Product class
require('database/product.php');

//cart class
require('database/cart.php');


//Product object
$product = new product($db);
$product_shuffle = $product->getData();


//cart object
$cart = new cart($db);

?>

