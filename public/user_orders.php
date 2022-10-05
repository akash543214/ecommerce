<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php");?>
<?php  
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    cancel_order($_POST['product_id']);
}


?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

      
            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                       
                    
                    </div>

                </div>

                <div class="row">
                    <h2 style = "text-align: center"> Orders </h2>
                    <h3 style = "text-align: center"> Arriving soon </h3>
        <?php
        if(isset($_SESSION['user_id']))
        {
$user_id=$_SESSION['user_id'];
$query = query("SELECT product_id FROM orders WHERE user_id=$user_id");
confirm($query);


$products= array();
while($row = fetch_array($query))
{
$product_id=$row['product_id'];

array_push($products,$product_id);
}


$length=count($products);
for($i=0;$i<$length;$i++)
{
    $query = query("SELECT * FROM products WHERE product_id=$products[$i]");
    confirm($query);
    while($row = fetch_array($query))
    {

        $price = $row['product_price'];
        $title = $row['product_title'];
        $product_id = $row['product_id'];
        $desc = $row['product_description'];
        $product_image = $row['product_image'];
        echo '<div class="">
        <div class="thumbnail" id="user_orders">
            <a href = "item.php?id='.$product_id.'"><img src="../resources/uploads/'.$product_image.'" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">₹'.$price.'</h4>
                <h4><a href="item.php?id='.$product_id.'">'.substr($title,0,13).'</a>
                </h4>
               <form action = "user_orders.php" method="post">
               <input type="hidden" name="product_id" value="'.$product_id.'">

               <input type="submit" value= "Cancel Order" class="btn btn-primary"></button>

                </form>
            </div>
           
        </div>
    </div>';

    }
    
}


        }
        ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php");?>