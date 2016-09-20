<?php 
    $mysql_hostname="localhost";
    $mysql_user="root";
    $mysql_password = "";
    $mysql_database = "sat";
    $prefix = "";
    $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");
 ?>