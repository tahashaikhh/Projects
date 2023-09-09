<?php 

    include "config.php";
    session_start();

    $vc_id = $conn->real_escape_string($_GET["vc"]);
    if($_SESSION["vc_id"] == $vc_id){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $conn->real_escape_string($_POST["user_name"]);
            $mobile = $conn->real_escape_string($_POST["mobile_no"]);
            $email = $conn->real_escape_string($_POST["email"]);
            $address = $conn->real_escape_string($_POST["address"]);
            $sql = "UPDATE `users` SET `user_name`='$name',`mobile_no`='$mobile',`email`='$email',`address`='$address' WHERE `vc_id` = '$vc_id'";

        if ($conn->query($sql) === TRUE) {
            header("location:customerhomepage.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }

        }
        $sql = "SELECT * FROM `users` WHERE `vc_id` = '$vc_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        echo '        
        <!doctype html>
        <html lang="en">
        
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ACV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
            .gradient-custom {
                background: #253238;
                background: -webkit-linear-gradient(to right bottom, #3F4D5A, #253238);
        background: linear-gradient(to right bottom, #3F4D5A, #253238)
    }
    </style>
    </head>
    
    <body>
    <section style="background-color: #f4f5f7;">
        <form method="post">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-white"
                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                <img src="avator.avif" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                <h6>VC ID</h6>
                <p class="text-muted text-white">'.$vc_id.'</p>
                </div>
                <div class="col-md-8">
                <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                <div class="col-6 mb-3">
                <h6>Name</h6>
                <input type="text" class="form-control" value="'.$row["user_name"].'" name="user_name">
                
                </div>
                <div class="col-6 mb-3">
                <h6>Phone</h6>
                <input type="text" class="form-control" value="'.$row["mobile_no"].'" name="mobile_no">
                </div>
                </div>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                <div class="col-6 mb-3">
                <h6>Email</h6>
                <input type="text" class="form-control" value="'.$row["email"].'" name="email">
                </div>
                <div class="col-6 mb-3">
                <h6>Address</h6>
                <textarea class="form-control" name="address" rows="3">'.$row["address"].'</textarea>
                </div>
                </div>
                <div class="d-flex justify-content-around">
                    <button type="submit" class="btn btn-dark text-center">Update</button>
                    <a class="btn btn-outline-dark text-center" href="customerhomepage.php">Cancel</a>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </form>
                </section>
                </body>
                </html>';
            }
            ?>