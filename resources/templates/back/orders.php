
    
                


        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
           <table class="table table-hover">
           <thead>
           <tr>
           <th>Order id</th>
           <th>Txn status</th>
           <th>Order Date</th>
           <th>Order status</th>
      </tr>
    </thead>
        <?php
    $query = query("SELECT * FROM orders");
    confirm($query);

    while($row = fetch_array($query))
    {


        echo '<tr>
        <td>'.$row["order_id"].'</td>
        <td>Successful</td>
        <td>'.$row["order_date"].'</td>
        <td>Pending</td>
        <td><button type="button" class="btn btn-primary">Process order</button>
        </td>
    </tr>';

    }
            ?> 
           
        </table>

</div>









 