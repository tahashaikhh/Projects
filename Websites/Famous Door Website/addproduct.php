<?php
session_start();
include 'conn.php';
if($_SESSION["user"] == "admin"){
  $msg = '';
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $targetDir = getcwd().DIRECTORY_SEPARATOR;
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir ."/".$fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){

      if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        $query = $mysqli->prepare("INSERT INTO `product`(`name`, `price`, `image`, `description`) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssss",$name, $price, $fileName, $desc);
        $result2 = $query->execute();
        if($result2){
          echo '<script type="text/JavaScript">
          alert("Product Sucessfully Added");
          </script>';
        }
        else{
          $msg = "There was a problem for adding the details";
        }
        $query->close();
      }else{
        $msg = "File was not uploaded successfully";
      }
    }else{
      $msg = "Please upload only in PNG and JPG format";
    }
}


    echo "<!doctype html>
    <html lang='en'>
      <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Add Product</title>
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
            <a class='nav-link active' href='addproduct.php'>Add Product</a>
            <a class='nav-link' href='deleteproduct.php'>Delete Product</a>
            <a class='nav-link' href='editproduct.php'>Edit Product</a>
            <a class='btn btn-danger' href='logout.php'>Log out</a>
          </div>
        </div>
      </div>
    </nav>

      <div class='col-sm-8 m-auto '>
      <h1 class='text-center my-3'>Enter a Product</h1>
      <form action='' method='post' enctype='multipart/form-data'>
      <div class='container text-center'>
                  <div class='row mt-2'>
                    <div class='col-sm-4'>
                      <label class='form-label'>Product Name</label>
                    </div>
                    <div class='col-sm-8'>
                    <input type='text' class='form-control' required name='name' placeholder='Enter Product Name'>
                    </div>
                    </div>
                    </div>
                    
                    <div class='container text-center'>
                    <div class='row mt-2'>
                    <div class='col-sm-4'>
                    <label class='form-label'>Price</label>
                    </div>
                    <div class='col-sm-8'>
                    <input type='number' class='form-control' required name='price' placeholder='Enter Price'>
                      </div>
                    </div>
                  </div>

                  <div class='container text-center'>
                  <div class='row mt-2'>
                    <div class='col-sm-4'>
                    <label class='form-label'>Image</label>
                    </div>
                    <div class='col-sm-8'>
                    <input class='form-control' type='file' required name='image'>
                      </div>
                    </div>
                  </div>


                  <div class='container text-center'>
                  <div class='row mt-2'>
                    <div class='col-sm-4'>
                    <label class='form-label'>Description</label>
                    </div>
                    <div class='col-sm-8'>
                    <textarea class='form-control'  name='desc' rows='3' placeholder='Enter Description'></textarea>
                      </div>
                    </div>
                  </div>



      <div class='text-center'>
        <button type='submit' class='btn btn-primary'>Submit</button>
      </div>
      <p class='text-danger text-center my-2'>".$msg."</p>
      </form>
    </div>
          <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
        </body>
        </html>
          ";
          mysqli_close($conn);
        }
        
        if(!isset($_SESSION["user"])){
          echo "You are not Logged In";
          header('location:db.php');
        }
        ?>