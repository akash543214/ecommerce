<?php
require_once("../../resources/config.php");

$query = query("SELECT * FROM cart WHERE user_id = ".$_GET['userid']."");
confirm($query);
while($row= fetch_array($query))
{
    $product_id = $row['product_id'];
    $product_price = $row['product_price'];
    $product_quantity = $row['product_quantity'];
    insert($product_id,$product_price,$product_quantity);
}


function insert($product_id,$product_price,$product_quantity)
{
    $user_id = $_GET['userid'];
    $query = query("INSERT INTO reports(user_id, product_id, product_price,product_quantity) VALUES ('$user_id','$product_id','$product_price','$product_quantity')");
    confirm($query);
}
redirect("../index.php");
?>