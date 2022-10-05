<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
require_once("../../resources/config.php");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )

	{ 	
		
		$order_id = $_POST['ORDERID'];
		$txn_amount = $_POST['TXNAMOUNT'];
		$status = $_POST['STATUS'];
		$txn_id = $_POST['TXNID'];
	
	/*
		foreach($_POST as $paramName => $paramValue) 
		{
			
	       echo "<br/>" . $paramName . " = " . $paramValue;
		  
		   
			
		}
		*/
		
	}


			


	
	//redirect("thankyou.php?userid=$user_id");





function insert($product_id,$product_price,$product_quantity,$order_id,$status,$txn_id)
{
    $user_id = $_GET['userid'];
	$order_amount = $product_price*$product_quantity;
	$query = query("INSERT INTO orders(order_id,product_id,user_id,order_amount,txn_id,transaction_status,order_quantity) VALUES ('$order_id','$product_id','$user_id','$order_amount','$txn_id','$status','$product_quantity')");
    confirm($query);
}

$query = query("SELECT * FROM cart WHERE user_id = ".$_GET['userid']."");
confirm($query);
while($row= fetch_array($query))
{
    $product_id = $row['product_id'];
    $product_price = $row['product_price'];
    $product_quantity = $row['product_quantity'];
    insert($product_id,$product_price,$product_quantity,$order_id,$status,$txn_id);
}
redirect("../index.php");

	
	

	

	
}
else 
{
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>