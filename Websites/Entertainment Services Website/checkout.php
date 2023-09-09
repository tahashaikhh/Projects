<?php
    include "config.php";
    include "credentials.php";
    session_start();
    if($_SESSION["vc_id"]){
        echo '
        <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .gradient-custom {
        background: #007BFF;
        background: -webkit-linear-gradient(to right bottom, #7FBDFF, #007BFF);
        background: linear-gradient(to right bottom, #7FBDFF, #007BFF)
    }
    </style>
</head>

<body>

        <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
              </div>
  
  
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
              <form>
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> Amin Cable
                      <small class="float-right">Date: '.date("d/m/Y").'</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>';
                if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["type"] == "Broadcast"){
                  $pack_id = $_POST["id"];
                  $pack_details = $_POST["type"];
                  $total_amount = $_POST["amount"];
                  $pack_name = $_POST["name"];
                  $_SESSION["channels"]["name0"] = $pack_name;
                  $_SESSION["channels"]["price0"] = $total_amount;
                  echo '
                  <input type="hidden" name="pack_id" value="'.$pack_id.'">
                  <input type="hidden" name="rechare_type" value="'.$pack_details.'">
                  <input type="hidden" name="total_amount" value="'.$total_amount.'">
                  <input type="hidden" name="pack_name" value="'.$pack_name.'">
                  <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Name</th>
                        <th>Price (&#8377;)</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>'.$pack_name.'</td>
                        <td> &#8377; '.$total_amount.'</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>


                <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="https://www.ecommerce-nation.com/wp-content/uploads/2019/02/razorpay.webp" width="100" heigth="100" alt="Razorpay">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Total:</th>
                        <td>&#8377;'.$total_amount.'</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
                  ';
                } elseif(str_contains($_SERVER['HTTP_REFERER'],"rechargepage") && $_GET["type"] == "channelpack"){
                 
                
                  echo '
                  <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Name</th>
                        <th>Price (&#8377;)</th>
                      </tr>
                      </thead>
                      <tbody>';
                      $count  = count($_SESSION["channels"])/2;
                      $total_amount = $_SESSION["total_amount"];
                      for ($i=0; $i < $count; $i++) {
                      echo '
                      <tr>
                        <td>'.$_SESSION["channels"]["name".$i].'</td>
                        <td> &#8377; '.$_SESSION["channels"]["price".$i].'</td>
                      </tr>';
                      };
                      echo '
                      </tbody>
                    </table>
                  </div>
                </div>


                <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src=".https://www.ecommerce-nation.com/wp-content/uploads/2019/02/razorpay.webp" alt="Razorpay">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Total:</th>
                        <td>&#8377;'.$total_amount.'</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
                  ';
                }elseif(str_contains($_SERVER['HTTP_REFERER'],"rechargepage") && $_GET["type"] == "all"){
          
                echo '
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Name</th>
                        <th>Price (&#8377;)</th>
                      </tr>
                      </thead>
                      <tbody>';
                      $count  = count($_SESSION["channels"])/2;
                      $subtotal_amount = $_SESSION["total_amount"];
                      $tax = ($subtotal_amount *18) /100;
                      $total_amount = $subtotal_amount + $tax + 20;

                      for ($i=0; $i < $count; $i++) {
                      echo '
                      <tr>
                        <td>'.$_SESSION["channels"]["name".$i].'</td>
                        <td> &#8377; '.$_SESSION["channels"]["price".$i].'</td>
                      </tr>';
                      }
                      echo '
                      </tbody>
                    </table>
                  </div>
                </div>
  
                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src=".https://www.ecommerce-nation.com/wp-content/uploads/2019/02/razorpay.webp" alt="Razorpay">
  
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                      plugg
                      dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                  </div>
                  <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>
  
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td> &#8377;'.$subtotal_amount.'</td>
                        </tr>
                        <tr>
                          <th>Tax (18%)</th>
                          <td> &#8377;'. $tax.'</td>
                        </tr>
                        <tr>
                          <th>Shipping:</th>
                          <td>&#8377; 20</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td> &#8377;'.$total_amount.'</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>';
              }else{
                header("location:rechargepage.php");
              }

                echo'  
                <div class="row no-print">
                  <div class="col-12">
                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <button type="button" id="paymentButton" class="btn btn-dark float-right"><i class="far fa-credit-card"></i> Submit
                      Payment
                    </button>
                    <a  class="btn btn-outline-dark float-right" href="rechargepage.php" style="margin-right: 5px;">
                      <i class="fas fa-x"></i> Cancel
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.invoice -->
              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script>
          const cashfree = Cashfree({
            mode:"sandbox" //or production
          });
          const paymentButton = document.getElementById("paymentButton");
          paymentButton.addEventListener("click", function () {

            $.ajax({
              type: "POST",
              url: "fetchSessionId.php",
              data : {amount : '.$total_amount.'},
                success: function(response)
                {
                  console.log(response["success"]["payment_session_id"]);
                  if(response["success"]){
                    const sessionID = response["success"]["payment_session_id"];
                    let checkoutOptions = {
                      paymentSessionId: sessionID,
                      returnUrl: '.$return_url.',
                      
                    }
                    cashfree.checkout(checkoutOptions).then(function(result){
                      if(result.error){
                        alert(result.error.message)
                      }
                      if(result.redirect){
                        console.log("Redirection")
                      }
                    });
                  }else{
                    alert("There is some problem at the payment gateway");  
                  }
                }
              });

          });
      </script>
      </body>
      </html>';   
    }
?>
