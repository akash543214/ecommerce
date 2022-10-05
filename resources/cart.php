<?php require_once("config.php"); ?>


<?php
if(isset($_SESSION['user_id']))
{

if(isset($_GET['product_id']))
{
    $query = query("SELECT * FROM cart WHERE product_id = ".$_GET['product_id']."");
    confirm($query);
    if(mysqli_num_rows($query)==0)
    {
      
   $user_id = $_SESSION['user_id'];
   
    $query = query("SELECT * FROM products WHERE product_id = ".$_GET['product_id']."");
    confirm($query);
    while($row= fetch_array($query))
    {
       
       $product_id= $row['product_id'];
       $product_title= $row['product_title'];
       $product_price= $row['product_price'];
       $product_description = $row['product_description'];
       $product_image = $row['product_image'];
 
    }
      
    $query = query("INSERT INTO cart(user_id, product_id, product_title,product_description, product_price,product_quantity,product_image) VALUES ('$user_id','$product_id','$product_title','$product_description','$product_price','1','$product_image')");
    confirm($query);
    redirect("../public/checkout.php");
    }

    else
    {
        redirect("../public/checkout.php");
    }
    
}


if(isset($_GET['add']))
{
    $product_id = $_GET['add'];
    $query = query("SELECT * FROM cart WHERE product_id = ".escape_String($_GET['add'])."");
    confirm($query);
    $quantity=0;
    while($row= fetch_array($query))
    {
        $quantity = $row['product_quantity'];
        $quantity++;
        $query = query("UPDATE cart SET product_quantity=$quantity WHERE product_id=$product_id");
        confirm($query);
        redirect("../public/checkout.php");
    }
  
}

if(isset($_GET['remove']))
{
    $product_id = $_GET['remove'];
    $query = query("SELECT * FROM cart WHERE product_id = ".escape_String($_GET['remove'])."");
    confirm($query);
    $quantity=0;
    while($row= fetch_array($query))
    {
        $quantity = $row['product_quantity'];
        $quantity--;
        $query = query("UPDATE cart SET product_quantity=$quantity WHERE product_id=$product_id");
        confirm($query);
        redirect("../public/checkout.php");
    }
}


if(isset($_GET['delete']))
{

    $product_id = $_GET['delete'];
    
       
        $query = query("DELETE FROM cart WHERE product_id=$product_id");
        confirm($query);
        redirect("../public/checkout.php");
    

}

function cart()
{
   
    $order_total=0;
    $order_quantity = 0;
 
           $user_id = $_SESSION['user_id'];
        $query = query("SELECT * FROM cart WHERE user_id = $user_id");
        confirm($query);
        while($row = fetch_array($query))
        {
            $price = $row['product_price']*$row['product_quantity'];
        $id = $row['product_id'];
      
        echo '<tr>
        <td>'.$row['product_title'].'</td>
        <td>₹'.$price.'</td>
        <td>'.$row['product_quantity'].'</td>
        
        
        <td><a class = "btn btn-warning" href = "../resources/cart.php?remove='.$id.'"><span class ="glyphicon glyphicon-minus"></span></a>     <a class = "btn btn-success"  href = "../resources/cart.php?add='.$id.'"><span class ="glyphicon glyphicon-plus"></span></a>
        <a class = "btn btn-danger"  href = "../resources/cart.php?delete='.$id.'"><span class ="glyphicon glyphicon-remove"></span></a> 
        </td>
        </tr>';

        $order_total = ($row['product_price']*$row['product_quantity'])+$order_total;
        $order_quantity = $row['product_quantity']+$order_quantity;
        }
    
      $_SESSION['order_total']=$order_total;
      $_SESSION['order_quantity']=$order_quantity;
}
}
?>