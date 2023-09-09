<?php

$server= 'localhost';
$username='root';
$password='';
$database='meal-connect';

$connection=mysqli_connect($server,$username,$password,$database);

if(!$connection){
    die(mysqli_connect_error());
}


// mysqli_close($connection);
?>
