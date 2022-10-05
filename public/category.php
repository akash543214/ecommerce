<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php");?>
<?php    
$cat_id = $_GET['cat_id'];
$query = query("SELECT cat_title FROM categories where cat_id = $cat_id");
confirm($query);

while($row = fetch_array($query))
{
 $cat_title = $row['cat_title'];

}


?>
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3><?php echo $cat_title;   ?></h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
     <?php  get_products_cat($_GET['cat_id']);?>
         
          
        <!-- /.row -->

       

    </div>
    <!-- /.container -->

   
<?php include(TEMPLATE_FRONT . DS . "footer.php");?>
