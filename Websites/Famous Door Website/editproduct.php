<?php
session_start();
include 'conn.php';

if($_SESSION["user"] == "admin"){
    echo "<!doctype html>
    <html lang='en'>
      <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Edit Product</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
      </head>
      <body>


      <nav class='navbar navbar-expand-lg bg-body-tertiary'>
      <div class='container-fluid'>
        <a class='navbar-brand' href='admin.php'>Famous</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarNavAltMarkup'>
          <div class='navbar-nav'>
            <a class='nav-link ' aria-current='page' href='admin.php'>Orders</a>
            <a class='nav-link' aria-current='page' href='messages.php'>Messages</a>
            <a class='nav-link ' aria-current='page' href='products.php'>Products</a>
            <a class='nav-link ' href='addproduct.php'>Add Product</a>
            <a class='nav-link' href='deleteproduct.php'>Delete Product</a>
            <a class='nav-link active' href='editproduct.php'>Edit Product</a>
            <a class='btn btn-danger' href='logout.php'>Log out</a>
          </div>
        </div>
      </div>
    </nav>

            <div class='col-sm-5 m-auto'>
            <h1 class='text-center my-2'>Edit an Item</h1>
            <form  action='insert.php' method='get'>
                    <div class='container text-center'>
                    <div class='row my-4'>
                      <div class='col-sm-4'>
                        <label class='form-label'>Product ID</label>
                      </div>
                      <div class='col-sm-8'>
                        <input type='text' class='form-control'  name='pid' placeholder='Enter Product ID'>
                      </div>
                    </div>
                  </div>
              <div class='text-center'>
                <button type='submit' class='btn btn-primary'>Submit</button>
              </div>
            </form>
          </div>
          </div>
          <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
        </body>
        </html>
          ";

          if(!isset($_SESSION["user"])){
            echo "You are not Logged In";
            header('location:db.php');
          }
    mysqli_close($conn);
}
?>
