<?php
session_start();
    include 'db_connection.php';
    $uid=$_SESSION['user'];
    $sql="SELECT * FROM user_details WHERE uid='$uid'" ;
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
    if(!$result){
        echo "Error";
    }
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Oswald:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="myaccstyle.css">
</head>

<body>
    <div class="container" >
    <form action="" method='POST'>
        <div class="box  col-12 m-0 ml-sm-5 col-sm-8 align-items-center text-center">
            <h1 class="my-7 mt-4">My Account</h1>
            <hr>

            <div class="row">
                <div class="col-sm-6">
                    <label for="inputEmail4" class="form-label ">Name</label>
                    <input type="text" disabled class="form-control" value= "<?php echo $row['name']; ?>" placeholder="" aria-label="name">
                </div>
                <div class="col-sm-6">
                    <label for="inputEmail4" class="form-label">Phone No</label>
                    <input type="text" disabled class="form-control" value= "<?php echo $row['phone']; ?>" placeholder="" aria-label="Phone">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="text" disabled class="form-control" value= "<?php echo $row['email']; ?>" placeholder="" aria-label="Email">
                </div>
                <div class="col-sm-6">
                    <label for="inputEmail4" class="form-label">Rating</label>
                    <input type="text" disabled class="form-control" placeholder="" 
                    value= "<?php echo $row['rating'];?>"
                    aria-label="Rating">
                </div>
            </div>
            <br>
			<div class="text-center">
				<a class="btn btn-outline-light col-lg-3 text-light my-3 btss" href="logout.php">Log Out</a>
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

</html>