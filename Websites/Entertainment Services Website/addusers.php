<?php
include "adminheader.php";
include "config.php";
session_start();

if($_SESSION["admin"]){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $c_name = $conn -> real_escape_string($_POST["c_name"]);
        $vc_id = $conn -> real_escape_string($_POST["vc_id"]);
        $mobile_no = $conn -> real_escape_string($_POST["mobile_no"]);
        $email = $conn -> real_escape_string($_POST["email"]);
        $password = $conn -> real_escape_string($_POST["password"]);
        $address = $conn -> real_escape_string($_POST["address"]); 
        $sql = "INSERT INTO `users`(`user_name`, `vc_id`, `mobile_no`, `email`, `password`, `address`) VALUES ('$c_name', '$vc_id', '$mobile_no', '$email', '$password', '$address')";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='text-center text-sucess'>New record created successfully</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

    }

    echo '   
    
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add User</h1>
                </div>
            </div>
        </div>
    </div>
    
    
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <form method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="c_name">Name</label>
                                    <input type="text" class="form-control" id="c_name" name="c_name"
                                    placeholder="Enter Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vc_id">VC ID</label>
                                    <input type="text" class="form-control" id="vc_id" name="vc_id"
                                    placeholder="Enter ID">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mobile_no">Mobile No</label>
                                    <input type="tel" class="form-control" maxlength="10" id="mobile_no" name="mobile_no"
                                    placeholder="Enter Mobile no">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Enter Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter Address">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
';
}else{
    header("location:adminlogin.php");
}
$conn->close();
?>