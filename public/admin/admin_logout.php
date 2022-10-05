<?php
require_once("../../resources/config.php");
//session_start();
unset($_SESSION['admin_name']); 
redirect("admin_login.php");

?>