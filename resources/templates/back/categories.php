<?php add_Categories(); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

            

            

<h1 class="page-header">
  Product Categories

</h1>


<div class="col-md-4">
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" class="form-control" name = "cat_title">
        </div>

        <div class="form-group">
            
            <input type="submit" name = "add_Category" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>
        <?php show_Categories_in_admin(); ?>
    </tbody>

        </table>




                
<?php include(TEMPLATE_BACK."/footer.php"); ?>









