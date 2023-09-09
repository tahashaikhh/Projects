<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="style.css">
<style>
    .input-row{
    width: 45%;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 5px ;
    padding: 13px 12px;
    margin-left: 11px;
    display: inline-block;
    margin-top: 6px;
    }
</style>
</head>
<body>
<section>
    <nav>
      <div class="navbar">
        <a href="#"><i class="gg-home-alt"></i> Home</a> 
        <a><i class="gg-search"></i> Explore</a> 
        <a href="#"><i class="gg-mail"></i> Contact</a> 
        <div class="dropdown">
          <a class="dropbtn"><i class="gg-user"></i>My Account</a>
          <div class="dropdown-content">
            <a href="#">My profile</a>
            <a href="#">Settings</a>
            <a href="Login.html">Log Out</a>
          </div> 
      </div> 
        
    </nav>
        
  </section>
      
    
    <h2>Hello Viewers</h2><br>
    <div class="btn">
        <button onclick="myFunction()">Light/Dark mode</button>
    </div>
    <script>
        function myFunction() {
        var element = document.body;
        element.classList.toggle("dark-mode");
        }
    </script>
    <br><br>


    <div class="container">
        <form name="formContact" id="formContact" method="post" action="">
            <div>
       
                Name 
                <span id="userName-info" class="info"></span><br />
                <input type="text" class="input-field" name="userName" id="userName">
            </div>
            <div>
                Email
                <span id="userEmail-info" class="info"></span><br> 
                <input type="text" class="input-field" name="userEmail" id="userEmail">
            </div>
            <div>
                Subject
                <span id="subject-info" class="info"></span><br> 
                <input type="text" class="input-field" name="subject" id="subject">
            </div>
            <div>
                Message
                <span id="userMessage-info" class="info"></span><br>
                <textarea name="content" id="content" class="input-field" cols="60" rows="6"></textarea>
            </div>
            <div>
                <input type="submit" name="send" class="btn-submit" value="Send">

                <div id="Message"> 
                        <?php
                        if (! empty($message)) {
                            ?>
                            <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                        <?php
                        }
                        ?>
                    </div>
            </div>

        </form>
    </div>
    <footer>
        <div class="foot">
            <h4>Thanks for Viewing!! Good Day</h4>
            <section>
                <a href="www.facebook.com" class="social-icons"><i class="gg-facebook"></i></a>
                <a href="www.instagram.com" class="social-icons"><i class="gg-instagram"></i></a>
                <a href="www.twitter.com" class="social-icons"><i class="gg-twitter"></i></a>
                <a href="www.youtube.com" class="social-icons"><i class="gg-youtube"></i></a>
            </section>
        </div>
    </footer>
</body>
</html>