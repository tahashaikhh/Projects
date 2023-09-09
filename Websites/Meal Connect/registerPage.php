<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	include 'db_connection.php';
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$rating=0;

	$sql1="SELECT * FROM `user_details` WHERE email='$email'";
	$result1=mysqli_query($connection,$sql1);
	$num=mysqli_num_rows($result1);
	
	if($num>=1){
		echo 'num';
		header('location:loginPage.php');
		

	}

	else{
		if($cpass==$pass){
			$sql="INSERT INTO `user_details` ( `name`, `email`, `password`, `phone`, `rating`) VALUES ( '$name', '$email', '$pass', '$phone', '$rating')";
			$result=mysqli_query($connection,$sql);
			if($result){
					echo '<script type="text/JavaScript">
					alert("Sucessfully register");
					</script>';
					header('location:loginPage.php');

			}
		}
		else{
			echo '<script type="text/JavaScript">
					alert("password doesnt match");
					</script>';
		}
	
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
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Oswald:wght@300&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="registerstyle.css">
</head>

<body>
	<img src="static\registerPage.png">


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



	<form action="" method='POST'>
		<div class="box  col-12 m-0 ml-sm-5 col-sm-6 align-items-center text-center">
			<h1 class="my-7 mt-5">Register</h1>
			<hr>
			<div class="row my-4">
				<div class="col-sm-3">
					<label for="name" class="form-label" name='fname'>Name</label>
				</div>
				<div class="col-sm-6">
					<input type="text" class='form-control input-buttons text-light' placeholder="Enter the Name" name="name" id="name"
						required>
				</div>
			</div>

			<div class="row my-4">
				<div class="col-sm-3">
					<label for="number" class="form-label">Phone No</label>
				</div>
				<div class="col-sm-6">
					<input type="tel" class='form-control input-buttons text-light' placeholder="Enter the phone no" maxlength="10" name="phone" id="num"
						required>
				</div>
			</div>

			<div class="row my-4">
				<div class="col-sm-3">
					<label for="email" class="form-label">Email</label>
				</div>
				<div class="col-sm-6">
					<input type="numberemail" class='form-control input-buttons text-light' placeholder="Enter the Email" name="email"
						id="email" required>
				</div>
			</div>

			<div class="row my-4">
				<div class="col-sm-3">
					<label for="password" class="form-label">Password</label>
				</div>
				<div class="col-sm-6">
					<input type="password" class='form-control input-buttons text-light' placeholder="Enter the password" name="pass" id="pass"
						required>
				</div>
			</div>

			<div class="row my-4">
				<div class="col-sm-3">
					<label for="resetpassword" class="form-label">Confirm password</label>
				</div>
				<div class="col-sm-6">
					<input type="password" class='form-control input-buttons text-light' placeholder="Enter the Confirm password" name="cpass"
						id="pass" required>
				</div>
			</div>


			<div class=" my-1 d-flex justify-content-between edit_space " style=" font-weight:bold;">    
                <div class="col-sm-3">
                    <label for="pass" class="form-label" >
                       <a href="" class="text-decoration-none">Forgot password</a> 
                    </label>
                </div> 

                <div class="col-sm-3 mx-3">
                    <label for="pass" class="form-label" >
						
                       <a href="loginPage.php" class="text-decoration-none  ">Already have an account Log In</a> 
                    </label>
                </div> 
            </div>

			<div class="text-center">
				<button type="submit" class="btn btn-outline-light col-lg-3 text-light my-3 btss">Register</button>
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