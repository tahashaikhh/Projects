<?php

session_start();
if(isset($_SESSION['user'])){
  
  
  echo '
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Meal Connect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
  img{
    width: 100%;
    position: absolute;
    height: 100%;
    top: 0;
    z-index: -1;
    font-family: Oswald, sans-serif;
      } 
        </style>
        </head>
      <body>
      <img src="./static/selectRole.png">
      <div class="background">
      
      <div class="container text-center my-4 px-4 pt-5 my-5">
      <h1 class="text-white">Select Your Role:</h1>
      <div class="container justify-content-center my-3">
      <a href="./donorPage.php" class="btn btn-dark m-2 fs-3">Donor</a>
      <a href="./receiverPage.php" class="btn btn-dark m-2 fs-3">Volunteer</a>
      </div>
      </div>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      </body>
      </html>';
      
    }
    else{
      header('location:loginPage.php');
    }
    
    ?>