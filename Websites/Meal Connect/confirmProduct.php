<?php 
session_start();
$fid = '';
if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'db_connection.php';
    global $fid;
    $fid = $_POST['item'];
    $_SESSION['fid'] = $fid;
}

$query = "SELECT * FROM `food_details` WHERE fid = '$fid'";
$result = mysqli_query($connection,$query);
$r = mysqli_fetch_assoc($result);
if ($count = mysqli_num_rows($result) > 0) {
echo '
    <html>
        <head>
            
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Oswald:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="receiverstyle.css">
        
    </head>
    <body>
        
<nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-end">
    <div class="d-grid gap-2 d-md-block ">
        <div class="container">
        <a class="btn btn-outline-light " href="myAccount.php">Account</a>
        <a class="btn btn-outline-light" href="logout.php">Logout</a>
    </div>
    
</div>
</nav>

<img src="static/donorPage.png" >
<form action="deletePage.php" method="POST" >
    <div class="box  col-12 m-0 ml-sm-5 col-sm-6 mt-5 align-items-center text-center">
    <h1 class="my-7 mt-5">Item Details</h1>
    <div class="row">
        <div class="col-sm-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" disabled class="form-control" value="'.$r['fname'].'" aria-label="name">
        </div>
        <div class="col-sm-6">
            <label for="inputEmail4" class="form-label">Quantity</label>
            <input type="number" disabled class="form-control" value="'.$r['quantity'].'" aria-label="quantity">
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-sm-6">
            <label for="inputEmail4" class="form-label">Expiry Date</label>
            <input type="text" disabled class="form-control" value="'.$r['expiry'].'" aria-label="expiry">
        </div>
        <div class="col-sm-6">
            <label for="inputEmail4" class="form-label">Address</label>
            <input type="text" disabled class="form-control" value="'. $r['address'] .'" aria-label="address">
        </div>
    </div>

        
            <br>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-light col-lg-3 ">Accept</button>
            </div>
            <div class="text-center mt-2">
              <a class="btn btn-outline-light" col-lg-3 href="receiverPage.php">Back</a>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>
</html>';
}
?>