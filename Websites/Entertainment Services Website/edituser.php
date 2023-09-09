<?php
include "adminheader.php";
include "config.php";
session_start();

if($_SESSION["admin"]){
    $uid = $conn -> real_escape_string($_GET["uid"]); 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $c_name = $conn -> real_escape_string($_POST["c_name"]);
        $vc_id = $conn -> real_escape_string($_POST["vc_id"]);
        $mobile_no = $conn -> real_escape_string($_POST["mobile_no"]);
        $email = $conn -> real_escape_string($_POST["email"]);
        $address = $conn -> real_escape_string($_POST["address"]); 
        $sql = "UPDATE `users` SET `user_name`='$c_name', `vc_id`='$vc_id',`mobile_no`='$mobile_no',`email`='$email',`address`='$address' WHERE `user_id` = $uid";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='text-center text-success>'Record updated successfully</p>";
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
        $sql = "SELECT * FROM `users` WHERE `user_id` = $uid";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }

        
    echo '   
    
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
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
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <form method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="c_name">Name</label>
                                    <input type="text" class="form-control" id="c_name" name="c_name" value="'.$row["user_name"].'"
                                  >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vc_id">VC ID</label>
                                    <input type="text" class="form-control" id="vc_id" name="vc_id" value="'.$row["vc_id"].'"
                                   >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mobile_no">Mobile No</label>
                                    <input type="tel" class="form-control" maxlength="10" id="mobile_no" name="mobile_no" value="'.$row["mobile_no"].'"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="'.$row["email"].'"
                                    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="'.$row["address"].'"
                                  >
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-danger" href="delete.php?type=user&uid='.$uid.'">Delete</a>
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
