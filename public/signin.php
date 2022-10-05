<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php");?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $username = escape_string($_POST['username']);
    $email = escape_string($_POST['email']);
    $password = escape_string($_POST['password']);
    $password2 = escape_string($_POST['password2']);
    
   if($password==$password2)
   {
    //$hash = password_hash($password, PASSWORD_DEFAULT);
    $query = query("INSERT INTO users(username, email, password) VALUES ('$username','$email','$password')");
    confirm($query);
    redirect("login.php");
    
   }
   else
   {
    echo "passwords do not match";
   }
}

?>



<form action = "signin.php" method = "post" id = "signin">
    <h2>Create new account</h2>

    <div class="form-group row">
  
    <label for="exampleInputPassword1">username</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name = "username" placeholder="username">
  </div>

  <div class="form-group row">
  
    <label for="exampleInputEmail1">email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  
</div>
  <div class="form-group row">
  
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name = "password" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group row">

    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name = "password2" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">sign in</button>
</form>


















<?php include(TEMPLATE_FRONT . DS . "footer.php");?>
