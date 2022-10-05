<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" id = "navbar"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id = "nav_ul">
                <li>
                        <a href="index.php">Home</a>
                    </li>
               <?php  if(!isset($_SESSION['username']))
               {

                   echo '<li>
                        <a href="login.php">Login</a>
                    </li>';

               }
               ?>
                
                     <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <?php
                    if(isset($_SESSION['username']))
                     {
               echo '<li>
                        <a href="user_orders.php">Orders</a>
                    </li>';
                     }
                    ?>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                </ul>
                <?php
                if(isset($_SESSION['username']))
                {
               echo '<ul class="nav navbar-right top-nav" id = "logout">
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  '.$_SESSION['username'].' <b class="caret"></b></a>
                    <ul class="dropdown-menu" id = "drop">
                       
                        <li class="divider"></li>
                        <li>
                        <a href="user_orders.php"><i class="fa fa-fw fa-power-off"></i>Profile</a>
                    </li>
                        <li>
                        <a href="user_orders.php"><i class="fa fa-fw fa-power-off"></i>Orders</a>
                    </li>
                    
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                       
                    </ul>';

                }  ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
        