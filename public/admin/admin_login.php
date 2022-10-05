<?php require_once("../../resources/config.php");?>
<?php //include(TEMPLATE_FRONT."/header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">
<head>

<body>
<?php

if(isset($_POST['submit']))
    {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM admin WHERE admin_name = '$username' AND password = '$password'");
        confirm($query);
       
        if(mysqli_num_rows($query)==0)
        {
          
            set_message("Invalid credentials");
            redirect("admin_login.php");
        }
        else
        {
            $query = query("SELECT admin_name FROM admin WHERE admin_name = '$username' AND password = '$password'");
            confirm($query);
            while($row = fetch_array($query))
            {
             
           
            $_SESSION['admin_name']= $username;
          
            redirect("index.php");
            }
        }

    }


?>

    <!-- Page Content -->
    <div class="container">

      <header>
          <br><br><br>  <h2 class="text-center">Admin Login</h2>
           
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="admin_login.php" method="post">
           
           
                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div>
                

                <div class="form-group">
                  <input type="submit" name="submit" value = "login" class="btn btn-primary">
                </div>
               
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

    <?php // include(TEMPLATE_FRONT."/footer.php"); ?>
</body>
</html>