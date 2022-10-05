<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php");?>

    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->

       <?php include(TEMPLATE_FRONT . DS . "side_nav.php");?>


       <?php
$product_id = $_GET['id'];
$query = query("SELECT * FROM products WHERE product_id=$product_id");
confirm($query);

while($row = fetch_array($query))
{
$product_image = $row['product_image'];
$product_title = $row['product_title'];
$product_price = $row['product_price'];
$product_description = $row['product_description'];
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $user_name = $_SESSION['username'];
    $review = $_POST['review'];
   $query = query("INSERT INTO reviews(product_id,user_name,review) VALUES ('$product_id','$user_name','$review')");
   confirm($query);
 
}



?>
<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="../resources/uploads/<?php echo $product_image; ?>" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#"><?php echo $product_title; ?></a> </h4>
        <hr>
        <h4 class="">₹<?php echo $product_price; ?></h4>

    <div class="ratings">
     
        <p>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            4.0 stars
        </p>
    </div>
          
        <p><?php echo substr($product_description,0,300); ?></p>

   
    <form action="">
        <div class="form-group">
            <?php
            if(isset($_SESSION['username']))
            {
           echo '<a class="btn btn-primary" target="_blank" href="../resources/cart.php?product_id='.$product_id.'">Add to cart</a>';
            }
            else
            echo '<a class="btn btn-primary" target="_blank" href="login.php">Add to cart</a>';
            ?>
        </div>
    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
           
    <p><?php echo $product_description;?></p>


    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  <div class="col-md-6">

      

        <hr>
        <?php

         $query = query("SELECT * FROM reviews WHERE product_id = $product_id");
         confirm($query);
         while($row = fetch_array($query))
         {
            $username = $row['user_name'];
            $review = $row['review'];
            $timestamp = $row['time'];
        echo '<div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                '.$username.'
                <span class="pull-right">'.$timestamp.'</span>
                <p>'.$review.'</p>
            </div>
        </div>';
         }
        ?>


    <div class="col-md-6">
        
        <?php  
       if(isset($_SESSION['username'])) 
       {
    echo '<h3>Add A review</h3> <form action="item.php?id= '.$product_id.'" class="form-inline" method = "post">
       

        <div>
            <h3>Your Rating</h3>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
        </div>

            <br>
            
             <div class="form-group">
             <textarea name="review" id="" cols="60" rows="10" class="form-control"></textarea>
            </div>

             <br>
              <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SUBMIT">
            </div>
        </form>';
       }
  ?>
    </div>

 </div>

 </div>

</div>


</div><!--Row for Tab Panel-->




</div>
</div>
    <!-- /.container -->
    <?php //include(TEMPLATE_FRONT . DS . "footer.php");?>
    <!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

