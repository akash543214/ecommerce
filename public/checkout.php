<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php");?>

<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");


  $query = query("SELECT * FROM cart");
        confirm($query);
       
        if(mysqli_num_rows($query)==0)
        {
          $show_btn=false;
        }
        else
        {
          $show_btn=true;
        }

  if(isset($_SESSION['user_id']))
  {
    $user_id = $_SESSION['user_id'];
   
  }
 
  if(isset($_SESSION['user_id']))
  {
$order_amount=0;
$order_quantity=0;

$query = query("SELECT * FROM cart WHERE user_id = ".$_SESSION['user_id']."");
confirm($query);

while($row = fetch_array($query))
{
$order_amount = $row['product_price']+$order_amount;
$order_quantity = $row['product_quantity']+$order_quantity;

}
$order_amount= $order_amount * $order_quantity;
  }
?>
    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">

      <h1>Checkout</h1>


<form action="paytm/pgRedirect.php" method="post">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
          <?php 
        if(isset($_SESSION['user_id']))
        {
          cart();
        }
        ?>
          
        </tbody>
    </table>
					
				<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999) ?>">
					

					<input type = "hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $user_id; ?>">
			
					
				
					<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
			
				
				
					<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">


					<input type = "hidden" title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $order_amount; ?>">

					
        <?php
        if(isset($_SESSION['user_id']) && $show_btn==true)
        {
			echo 	'<input value="CheckOut" class="btn btn-success" type="submit"	onclick="">';
        }

        ?>
      
         
        
        
      
    



</form>



<!--  ***********CART TOTALS*************-->
    <?php    
    if(isset($_SESSION['user_id']))
    {
echo '<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"> 
'.$order_quantity.'</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">₹'.$order_amount.'</span></strong> </td>
</tr>


</tbody>

</table>

</div>';
    }
    else
    echo '<div class="alert alert-warning" role="alert">
   please Login to access the cart! <a href = "login.php"> login </a>
  </div>';
?>


<!-- CART TOTALS-->


 </div><!--Main Content-->
</div>

 <?php include(TEMPLATE_FRONT . DS . "footer.php");?>
