<?php

function redirect() {
    header('location:main.html');
}


    if(isset($_POST['email'])){
        $server = 'localhost';
        $username = 'root';
        $pas = '';
        $db_name = 'test';

        $con = mysqli_connect($server, $username, $pas, $db_name);

        if(!$con){
        die("connection failed due to" .mysqli_connect_error());
        }

        $email = $_POST['email'];  
        $password = $_POST['password'];  
       
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from test where email = '$email' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "Successfully Login";  
            redirect();
        }  
        else{  
            echo "<h1> Login failed. Invalid email or password.</h1>";  
        }     
    }

?>