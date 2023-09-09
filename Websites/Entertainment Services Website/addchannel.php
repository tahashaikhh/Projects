<?php
include "adminheader.php";
include "config.php";
session_start();

if($_SESSION["admin"]){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $channel_name = $conn -> real_escape_string($_POST["channel_name"]);
        $price = $conn -> real_escape_string($_POST["price"]);
        $sql = "INSERT INTO `all_channels`(`channel_name`, `price`) VALUES ('$channel_name','$price')";
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
                    <h1 class="m-0">Add Channel</h1>
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
                        <h3 class="card-title">Add Channel</h3>
                    </div>
                    <form method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="channel_name">Name</label>
                                    <input type="text" class="form-control" id="channel_name" name="channel_name"
                                    placeholder="Enter Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Enter Price">
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
