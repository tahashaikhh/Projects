<?php
include 'conn.php';
session_start();
$cart_count = '';
if (!empty($_SESSION["shopping_cart"])) {
  $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
if(isset($_POST['name'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $query = $mysqli->prepare("INSERT INTO `message`(`name`, `subject`, `email`, `message`) VALUES (?, ?, ?, ?)");
  $query->bind_param("ssss",$name, $email, $subject, $message);
  $result = $query->execute();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='icon' href='icon.ico' type='image/icon type'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
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
              <span><?php echo (($cart_count) ? $cart_count : '0')?></span>
            </a>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
  
      </div>
    </header>


    <section id="about" class="about" style="margin-top: 39px;">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Famous Old Wood Timber Mart and Furniture</h3>
            <p class="fst-italic">
            Welcome to our Famous Old Wood Timber Mart and Furniture! We specialize in creating high-quality doors made from a variety of materials, including timber wood. Our team of skilled craftsmen takes great pride in using the finest timber wood available to create doors that are not only functional but also beautiful. Timber wood is a popular choice for doors due to its durability, natural beauty, and ability to be customized to fit any design style. Whether you are looking for a classic, rustic look or a more modern, sleek design, our timber wood doors are sure to meet your needs. We use only the latest manufacturing techniques to ensure that every door we produce is of the highest quality. 
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i>Our doors are available in a wide range of styles and finishes to complement any décor. </li>
            </ul>
            <p>
            At our company, we believe that a door is more than just an entrance or exit, it is a work of art that should be both functional and aesthetically pleasing. Let us help you open the door to a beautiful and secure home or business with our expertly crafted timber wood doors.
            </p>
          </div>
        </div>

      </div>
    </section>


    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
          <p>We would be glad to connect with you</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>G NO 55/4 P NO 3, Famous Market Devi Ka Malla, Malegaon, Nashik, Maharashtra - 423203</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>famousoldwoodtimbermartandfurn@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call: Habiburahman</h4>
                <p>+91 6394090439</p>
              </div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.421589667335!2d74.55502241423814!3d20.57083388624825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bde99fb2c7b52df%3A0xe0e813644b835c53!2sFamous%20old%20wood%20timber%20mart%20and%20furniture!5e0!3m2!1sen!2sin!4v1679834361549!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      </body>
    </html>    
        