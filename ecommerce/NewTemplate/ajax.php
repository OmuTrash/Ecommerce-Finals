<?php

//require sql connection
require('../database/DBconnection.php');

//Product class
    require('../database/product.php');



//DBconnection object
$db = new DBconnection();


//Product object
$product = new product($db);


if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);

}

?>