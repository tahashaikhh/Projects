<?php
session_start();
include 'config.php';

    if($_SESSION["vc_id"]){
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $username =  $_SESSION["vc_id"];
        $password = $_POST['password'];
        $password = $conn -> real_escape_string($password);
        $newpassword = $_POST['newpassword'];
        $newpassword = $conn -> real_escape_string($newpassword);
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $confirmnewpassword = $conn -> real_escape_string($confirmnewpassword);

        $sql = "SELECT password FROM users WHERE vc_id='$username'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if(!$result)
        {
        $error =  "The username you entered does not exist";
        }
        else if($password != $row["password"])
        {
        $error =  "You entered an incorrect password";
        }
        elseif($password == $row["password"]){

          if($newpassword==$confirmnewpassword){
            $sql1="UPDATE users SET password='$newpassword' where vc_id='$username'";
            if($conn->query($sql1) === TRUE)
            {
              $error = "Congratulations You have successfully changed your password";
            }
            else
            {
              $error = "An error occured";
            }
          }else{
            $error = "password does not match";
          }
        }else{
          $error =  "There was a Problem";
        }
      }
      echo '
      <!doctype html>
      <html lang="en">
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Login</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        </head>
        <body>
        <section class="vh-100" style="background-color: #253238;">
        <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="login.avif"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                  
                  <form method="post">
                      
                      <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Change your passoword</h5>

                  <div class="form-outline mb-4">
                      <label class="form-label" for="password">Enter your existing password:</label>
                      <input type="password" size="10" id="password" name="password" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="newpassword">Enter your new password:</label>
                  <input type="password" id="newpassword" size="10" name="newpassword" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
              <label class="form-label" for="confirmnewpassword">Re-enter your new password:</label>
              <input type="password" id="confirmnewpassword" size="10" name="confirmnewpassword" class="form-control form-control-lg" />
          </div>
                  <p class="text-danger">'. $error .'</p>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Reset</button>
                </div>
                
                  <a class="small text-muted" href="customerhomepage.php">Go to Home </a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>';
}else{
  header("login.php");
}
  ?>
