<?php
session_start();
include 'conn.php';


$results_per_page = 12;
$cart_count = '';
if (!empty($_SESSION["shopping_cart"])) {
  $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
if(!empty($_SESSION['temp'])){
  unset($_SESSION['temp']);
}
    $query = "SELECT * FROM `product`";
    $result = mysqli_query($conn, $query);
    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil($number_of_result/$results_per_page);
    if (!isset($_GET['page'])){
      $page = 1;
    }else{
      $page = $_GET['page'];
    }
    $page_first_result = ($page -1 ) * $results_per_page;
    $query1 = "SELECT * FROM product LIMIT ".$page_first_result.",".$results_per_page;
    $result1 = mysqli_query($conn, $query1);
    echo "
      <!doctype html>
      <html lang='en'>
          <head>
              <meta charset='utf-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1'>
              <title>Famous</title>
              <link href='style.css' rel='stylesheet'>
              <link rel='icon' href='icon.ico' type='image/icon type'>
              <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
              <style>
                .page-link{
                  color: #16df7e !Important;
                }
                .pagination > .active > a{
                  background: #16df7e !Important;
                  border-color: #16df7e;
                  color: white !Important;
                }
              </style>           
          </head>
          <body>";
      echo '
      <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center justify-content-between">
  
      <a href="index.php">
      <img src="logo.png" style="width: 160px;" alt="Famous" class="img-fluid">
      </a>
        
  
        <nav id="navbar" class="navbar">
          
            <a class=" nav-link scrollto " href="cart.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>&nbsp
              <span>'.(($cart_count)?$cart_count: '0').'</span>
            </a>
         
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
  
      </div>
    </header>      
            
    <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Opening The Door To Quality And Beauty</h1>
          <h2>Where Every Door is a Work of Art</h2>
          <div class="d-flex">
            <a href="about.php" class="btn-get-started scrollto">About Us</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="home.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>';

      if ($count = mysqli_num_rows($result1) > 0) {
        echo "  
        <div class='row row-cols-1 row-cols-md-3 m-0'>";
        while($r = mysqli_fetch_assoc($result1)){
        echo "<form name='productitemlist' method='get' action='product_detail.php'>";
          echo "<input type='hidden' name='pid' value='".$r['pid']."'/>";
          echo "<button type='submit' class='btn w-100'>";
                  echo "<div class='col'>";
                  echo "<div class='card h-100 border-light rounded-4'>";
                  echo "<img src='".$r['image']."' width='500' height='500' class='card-img-top'>";
                  echo "<div class='card-body'>
                        <h5 class='card-title'>".$r['name']."</h5>
                        <p class='card-text'>&#8377;".$r['price']." <br> <br> </p>
                        </div>
                        </div>
                        </div>
                        </button>
                        </form>
                        ";
                }
                echo "
                </div>
                    <div class='container table-responsive'>
                    <ul class='pagination justify-content-center'>
                    <li class='page-item ".(($page == 1)? 'disabled' : '')."'><a class='page-link' href='index.php?page=". (($page == 1)? '1' : $page - 1) ."'>Previous</a></li>
                    ";
                    for($page_no = 1; $page_no<= $number_of_page; $page_no++) {  
                     echo " <li class='page-item ".(($page == $page_no)? "active'" : "'")."><a class='page-link' href='index.php?page=". $page_no ."'>". $page_no ."</a></li>";
                    }  
                    echo "<li class='page-item ".(($page == $number_of_page || $number_of_result == $results_per_page)? 'disabled' : '')."'><a class='page-link' href='index.php?page=". (($page == $number_of_page || $number_of_result == $results_per_page)? '' : $page + 1)."'>Next</a></li>
                    </ul>
                  </div>
                ";
    }else{
      echo "<h1 class='text-center mt-4'>Sorry! There are no products currently.</h1>
      </div>";
    }

  mysqli_close($conn);
?>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
  </body>
</html>