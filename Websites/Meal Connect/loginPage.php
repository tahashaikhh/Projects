<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'db_connection.php';
	$email=$_POST['email'];
	$pass=$_POST['pass'];

    
	$sql="SELECT uid FROM `user_details` WHERE email='$email' and password ='$pass'";
	$result=mysqli_query($connection,$sql);
	$num=mysqli_num_rows($result);
    
	if($num>=1){
        $row=mysqli_fetch_assoc($result);
        
		$_SESSION['user']=$row['uid'];
		header('location:selectRole.php');

		
	}
	else{
		echo '<script type="text/JavaScript">
					alert("Invalid Id password");
					</script>';
	}

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
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
  <img src="static\loginPage.png" >

  <div class="background ">  
    <nav class="navbar navbar-expand-lg position-absolute w-100 popup" style="z-index:  1">
      <div class="container-fluid">
    
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="fs-6 btn btn-outline-light btn-lg px-4 me-sm-3" aria-current="page" href="index.php">Home</a>
            <a class="fs-6 btn btn-outline-light btn-lg px-4 me-sm-3" href="aboutPage.php">About</a>
            <a class="fs-6 btn btn-outline-light btn-lg px-4 me-sm-3" href="contactPage.php">Contact</a>

          </div>
        </div>
      </div>
    </nav>


    <form action="" method='POST' >
        <div class="box  col-12 m-0 ml-sm-5 col-sm-6 align-items-center text-center">
            <h1 class="my-7 mt-5">Login</h1>
            <hr>
            <div class="row my-5">
                <div class="col-sm-3">
                    <label for="email" class="form-label" name='fname'>Email</label>
                </div>
                <div class="col-sm-6">
                    <input type="email" class='form-control input-buttons text-light' placeholder="Enter Your Email" name="email" id="email" required>
                </div>
            </div>

            <div class="row my-5">
              <div class="col-sm-3">
                  <label for="pass" class="form-label" >Password</label>
              </div>
              <div class="col-sm-6">
                  <input type="password" class='form-control input-buttons text-light' placeholder="Enter Your Password" name="pass" id="pass" required>
              </div>
          </div>
       

          <div class=" my-1 d-flex justify-content-between">    
              <div class="col-sm-3">
                  <label for="pass" class="form-label" >
                       <a href="">Forgot password</a> 
                    </label>
                </div> 

                <div class="col-sm-3">
                    <label for="pass" class="form-label" >
                        <a href="registerPage.php">Create Account</a> 
                    </label>
                </div> 
            </div>


            <br>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-light col-lg-3 ">Login</button>
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