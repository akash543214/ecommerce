<?php require_once("../resources/config.php"); 

$query = query("DELETE  FROM reports WHERE product_id = ".$_GET['productid']." AND user_id= ".$_GET['userid']."");
    confirm($query);
redirect("user_orders.php");



?>