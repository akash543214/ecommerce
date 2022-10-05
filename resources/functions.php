<?php
session_start();


function set_message($msg)
{
if(!empty($msg))
{
    $_SESSION['message']=$msg;
}
else
{
    $msg = "";
}
}

function display_message()
{
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
}

function redirect($location)
{
    header("location: $location");
}

function query($sql)
{
    global $connection;

    return mysqli_query($connection, $sql);
}

function confirm($result)
{
global $connection;
if(!$result)
{
    die("query failed". mysqli($connection));
}
}

function escape_String($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, $string); 

}

function fetch_array($result)
{
   return mysqli_fetch_array($result);
}


function get_products()
{
    $query = query("SELECT * FROM products");
    confirm($query);

    while($row = fetch_array($query))
    {
        $price = $row['product_price'];
        $title = $row['product_title'];
        $product_id = $row['product_id'];
        $desc = $row['product_description'];
        $product_image = $row['product_image'];
        if(isset($_SESSION['username']))
        {
        echo '<div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href = "item.php?id='.$product_id.'"><img src="../resources/uploads/'.$product_image.'" alt="" style="height: 210px; width:300px;"></a>
            <div class="caption">
                <h4 class="pull-right">₹'.$price.'</h4>
                <h4><a href="item.php?id='.$product_id.'">'.substr($title,0,13).'</a>
                </h4>
                <p>'.substr($desc,0,70).'...</p>
                <a class="btn btn-primary" target="_blank" href="../resources/cart.php?product_id='.$product_id.'">Add to cart</a>
            </div>
           
        </div>
    </div>';
        }
        else
        {
            echo '<div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <a href = "item.php?id='.$product_id.'"><img src="../resources/uploads/'.$product_image.'" alt=""></a>
                <div class="caption">
                    <h4 class="pull-right">₹'.$price.'</h4>
                    <h4><a href="item.php?id='.$product_id.'">'.substr($title,0,13).'</a>
                    </h4>
                    <p>'.substr($desc,0,70).'...</p>
                    <a class="btn btn-primary" target="_blank" href="login.php">Add to cart</a>
                </div>
               
            </div>
        </div>';
        }
    }

}

function get_categories()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    while($row = fetch_array($query))
    {
        $cat = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo '<a href="category.php?cat_id='.$cat_id.'" class="list-group-item">'.$cat.'</a>';

    }

}

function get_products_cat($catid)
{
    $query = query("SELECT * FROM products WHERE product_category_id = ".escape_String($catid)."");
    confirm($query);

    while($row = fetch_array($query))
    {
        $price = $row['product_price'];
        $title = $row['product_title'];
        $product_id = $row['product_id'];
        $desc = $row['product_description'];
        $product_image = $row['product_image'];
        echo ' <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href = "item.php?id='.$product_id.'"><img src="../resources/uploads/'.$product_image.'" alt=""  style="height: 210px; width:300px;"></a>
            <div class="caption">
                <h4 class="pull-right">₹'.$price.'</h4>
                <h4><a href="item.php?id='.$product_id.'">'.substr($title,0,13).'</a>
                </h4>
                <p>'.substr($desc,0,100).'...</p>
                <a class="btn btn-primary" target="_blank" href="item.php?id='.$product_id.'">Add to cart</a>
            </div>
           
        </div>
    </div>';
    }

}

function login_user()
{
    if(isset($_POST['submit']))
    {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
       
        $query = query("SELECT * FROM users WHERE username = '$username'");
        confirm($query);
       
        if(mysqli_num_rows($query)==0)
        {
          
            set_message("Invalid credentials");
            redirect("login.php");
        }
            else
            {
            $query = query("SELECT * FROM users WHERE username = '$username'");
            confirm($query);
            
             while($row = fetch_array($query))
              {
                if($password==$row['password'])
                {
                    $_SESSION['user_id']= $row['user_id'];
                    $_SESSION['username']= $username;
                    $_SESSION['logged_in']=true;
                    redirect("index.php");
                }
                else
                {
                    set_message("Invalid credentials");
                    redirect("login.php");
                }

             }


            }
        /*
        else
        {
            $query = query("SELECT user_id FROM users WHERE username = '$username' AND password = '$password'");
            confirm($query);
            while($row = fetch_array($query))
            {
             
            $_SESSION['user_id']= $row['user_id'];
            $_SESSION['username']= $username;
            $_SESSION['logged_in']=true;
            redirect("index.php");
            }
        }
        */

    }
}

function send_message()
{
    if(isset($_POST['submit']))
    { 
        $to = "sharma.54akash@gmail.com";
       $name = $_POST['name'];
       $email = $_POST['email'];
       $subject = $_POST['subject'];
       $message = $_POST['message'];

       $headers = "From: {$name} {$email}";
       $result = mail($to,$subject,$message,$headers);

       if(!$result)
       {
        echo "error";
       }
       else
       echo "sent";
    }
}




function get_products_in_admin()
{
    $query = query("SELECT * FROM products");
    confirm($query);

    while($row = fetch_array($query))
    {
        $price = $row['product_price'];
        $title = $row['product_title'];
        $product_id = $row['product_id'];
        $desc = $row['product_description'];
        echo '<tr>
        <td>'.$product_id.'</td>
        <td>'.$row['product_title'].'<br>
          <img src="http://placehold.it/62x62" alt="">
        </td>
        <td>category</td>
        <td>'.$price.'</td>
        <td>'.$row['product_quantity'].'</td>
    </tr>';
    }
}

function add_product()
{
    if(isset($_POST['publish']))
    {
        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $product_image = escape_string($_FILES['file']['name']);
        $target_path = "C:/xampp/htdocs/ecommerce/resources/uploads/";  
       $target_path = $target_path.basename($_FILES['file']['name']);   
  
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
     

     

        

        $query = query("INSERT INTO products(product_title,product_Category_id, product_price,product_quantity,product_description,product_image) VALUES ('$product_title','$product_category_id', '$product_price','$product_quantity','$product_description','$product_image')");
        confirm($query);
       // set_message("new product just added");
        redirect("index.php?products");
        
    }
}


function show_categories()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    while($row = fetch_array($query))
    {
        $cat_id = $row['cat_id'];
        $cat = $row['cat_title'];
      
       
        echo '<option value="'.$cat_id.'">'.$cat.'</option>';

    }

}



function show_categories_in_admin()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    while($row = fetch_array($query))
    {
        $cat_id = $row['cat_id'];
        $cat = $row['cat_title'];

        echo '<tr>
        <td>'.$cat_id.'</td>
        <td>'.$cat.'</td>
    </tr>';
    }
}


function add_Categories()
{
    if(isset($_POST['add_Category']))
    {
        $cat_title = $_POST['cat_title'];
    $query = query("INSERT INTO categories(cat_title) VALUES ('$cat_title')");
    confirm($query);
    redirect("index.php?categories");
    }
}

function display_users_in_admin()
{
    $query = query("SELECT * FROM users");
    confirm($query);
    while($row = fetch_array($query))
    {
        $username = $row['username'];
        $user_id = $row['user_id'];
        $address = $row['address'];
        $email = $row['email'];

        echo '<tr>
        <td>'.$user_id.'</td>
        <td>'.$username.'</td>
        <td>'.$email.'</td>
        <td>'.$address.'</td>
    </tr>';
    }

}

function cancel_order($product_id)
{
    $query = query("DELETE FROM orders WHERE  product_id = '$product_id'");
        confirm($query);
       
      
}
?>