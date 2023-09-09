<?php

function redirect() {
    header('location:login.html');
}


    if(isset($_POST['fname'])){
    $server = 'localhost';
    $username = 'root';
    $password = '';

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection failed due to" .mysqli_connect_error());
    }
    // echo "success";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `test`.`test`(`fname`, `lname`, `email`, `password`, `datetime`) VALUES ('$fname', '$lname', '$email', '$password', current_timestamp())";
    echo $sql;

    if($con->query($sql)==true){
        echo '<p class="success">Congratulations, you are registered</p>';
        redirect();
    }
    else{
        echo "ERROR : $sql <br> $conn->error";
    }

    $con->close();
    }


   
?>