<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php");?>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
           
        <div class="col-sm-4 col-sm-offset-5" id="login_container">         
            <form class="" action="login.php" method="post" id="login_form">
            <h3><?php display_message();?></h3>
            <?php login_user();?>
                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control" id="username"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control" id="password"></label>
                </div>
                
               
               
                
                <div class="form-group">
                  <input type="submit" id="login_btn" name="submit" value = "login" class="btn btn-primary">
                </div>
                <p> Do not have a account? <a href = "signin.php">Sign in.</a></p>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php");?>
