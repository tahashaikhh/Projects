<?php
include "adminheader.php";
include "config.php";
session_start();

if($_SESSION["admin"]){
    $cid = $conn -> real_escape_string($_GET["cid"]);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $channel_name = $conn -> real_escape_string($_POST["channel_name"]);
        $price = $conn -> real_escape_string($_POST["price"]);
        $sql = "UPDATE `all_channels` SET `channel_name`='$channel_name', `price`='$price' WHERE `channel_id` = $cid";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='text-center text-success>'Record updated successfully</p>";
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
    
        $sql = "SELECT * FROM `all_channels` WHERE `channel_id` = $cid";
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
                    <h1 class="m-0">Edit Channel</h1>
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
                        <h3 class="card-title">Edit Channel</h3>
                    </div>
                    <form method="post">
                        <div class="card-body">
                            <div class="row">
                               
                                <div class="form-group col-md-6">
                                    <label for="c_name">Channel Name</label>
                                    <input type="text" class="form-control" name="channel_name" value="'.$row["channel_name"].'"
                                  >
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile_no">Price</label>
                                <input type="tel" class="form-control" maxlength="10"  name="price" value="'.$row["price"].'"
                                >
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-danger" href="delete.php?type=channel&cid='.$cid.'">Delete</a>
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
