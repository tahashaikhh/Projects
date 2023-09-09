<?php
session_start();
$cart_count = '';
$total_price ='';
$isempty = False;
if (!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}else{
    $isempty = True;
}

if (isset($_POST['action']) && $_POST['action']=="remove"){
      $remove_pid = $_POST["pid"];
      $remove_size = $_POST["size"];
      $remove_city = $_POST["city"];
        if(!empty($_SESSION["shopping_cart"])) {
          if($cart_count == 1){
            unset($_SESSION["shopping_cart"]);
          $cart_count = '';
          }else{
            foreach(array_keys($_SESSION["shopping_cart"]) as $key) {
              if($remove_pid == $_SESSION["shopping_cart"][$key]["pid"] and $remove_size == $_SESSION["shopping_cart"][$key]["size"] 
              and $remove_colour == $_SESSION["shopping_cart"][$key]["colour"] and $remove_city == $_SESSION["shopping_cart"][$key]["city"]){
              unset($_SESSION["shopping_cart"][$key]);
              $status = "<div class='box' style='color:red;'>
              Product is removed from your cart!</div>";
              }
              if(empty($_SESSION["shopping_cart"]))
              unset($_SESSION["shopping_cart"]);
            $cart_count = '';
              }		
          }
            if(empty($_SESSION["shopping_cart"]))
            unset($_SESSION["shopping_cart"]);
        }
    if (!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    }
}

if(isset($_POST['action']) && $_POST['action']=="clear"){
unset($_SESSION["shopping_cart"]);
$cart_count = '';
}

if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["shopping_cart"] as &$value){
    if($value['pid'] === $_POST["pid"]){
        $value['quantity'] = $_POST['quantity'];
        break;
    }
}

}
if (isset($_SESSION["shopping_cart"])) {
    $total_price = 0;
}
if(!empty($_SESSION["shopping_cart"])){
    foreach($_SESSION["shopping_cart"] as $sp){
    $total_price = $total_price + (int)$sp['price']*$sp['quantity'];
    }
}

if (!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
echo "
<!doctype html>
  <html lang='en'>
    <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <title>Checkout</title>
      <link rel='icon' href='icon.ico' type='image/icon type'>
      <link href='checkoutstyle.css' rel='stylesheet'>
      <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
    </head>
<body>
        <div class='card'>
            <div class='row'>
                <div class='col-md-8 cart'>
                    <div class='title'>
                        <div class='row'>
                            <div class='col'><h4><b>Shopping Cart</b></h4></div>
                            <div class='col align-self-center text-right text-muted'>".(($cart_count)? $cart_count : '0')." items</div>
                        </div>
                    </div>    
                    ";
                    if(!empty($_SESSION["shopping_cart"])){
                        foreach($_SESSION["shopping_cart"] as $product){
                            echo "
                            <div class='row'>
                            <div class='row main align-items-center'>
                            <div class='col-2'><img class='img-fluid' src='".$product['image']."'></div>
                            <div class='col'>
                                <div class='row text-muted'>". $product["size"]." inches </div>
                                <div class='row'>".$product['name']."</div>
                            </div>
                            <div class='col'>
                            <form method='post' action=''>
                            <input type='hidden' name='pid' value='". $product["pid"]."'/>
                            <input type='hidden' name='action' value='change' />
                            <select name='quantity' class='form-select' onchange='this.form.submit()'>
                            <option ".(($product['quantity'] == '1')? 'selected': '')." value='1'>1</option>
                            <option ".(($product['quantity'] == '2')? 'selected': '')." value='2'>2</option>
                            <option ".(($product['quantity'] == '3')? 'selected': '')." value='3'>3</option>
                            <option ".(($product['quantity'] == '4')? 'selected': '')." value='4'>4</option>
                            <option ".(($product['quantity'] == '5')? 'selected': '')." value='5'>5</option>
                            </select>
                            </form>
                            </div>
                            <div class='col' style='display: contents;'>&#8377; ".$product['price']." 
                            <form method='post' action=''>
                            <input type='hidden' name='pid' value='". $product["pid"]."' />
                            <input type='hidden' name='size' value='". $product["size"]."' />
                            <input type='hidden' name='colour' value='". $product["colour"]."' />
                            <input type='hidden' name='city' value='". $product["city"]."' />
                            <input type='hidden' name='action' value='remove' />
                            <button type='submit' name='remove' class='btn btn-link m-auto close'>&#10005;</button>
                            </form>
                            </div>
                        </div>
                    </div>";
                            }
                        }else{
                            echo "
                            <h2 class='text-center'>There are no items in the cart</h2>
                            ";
                        }
                   echo "
                    <div class='back-to-shop' style='display: contents;'><a href='index.php'>&leftarrow; <span class='text-muted'>Back to shop</span></a></div>
                    </div>
                    <div class='col-md-4 summary'>
                    <div><h5><b>Customer Details</b></h5></div>
                    <hr>
                    <form action='processorder.php' method='post'>

                    <div class='container text-center'>
                    <div class='row mt-2'>
                      <div class='col-sm-4' style='white-space: nowrap;'>
                        <label for='inputName' class='col-sm-2 col-form-label'>Name</label>
                      </div>
                      <div class='col-sm-8'>
                        <input type='text' class='form-control' ".(($isempty) ? "disabled" : " " )." name='name' required id='inputName' placeholder='Enter your Name'>                          
                        </div>
                      </div>
                    </div>

                    <div class='container text-center'>
                        <div class='row mt-2'>
                          <div class='col-sm-4' style='white-space: nowrap;'>
                            <label for='mobile_no' class='form-label '>Mobile No</label>
                          </div>
                          <div class='col-sm-8'>
                            <input type='tel' class='form-control' ".(($isempty) ? "disabled" : " " )." minlength='10' required maxlength='10' name='mobile_no' id='mobile_no' placeholder='Enter Mobile No ' required >
                          </div>
                        </div>
                      </div>


                      <div class='container text-center'>
                          <div class='row mt-2'>
                            <div class='col-sm-4' style='white-space: nowrap;'>
                              <label for='exampleFormControlTextarea1' class='form-label'>Address</label>
                            </div>
                            <div class='col-sm-8'>
                              <textarea class='form-control' name='address' ".(($isempty) ? "disabled" : " " )." required id='exampleFormControlTextarea1' rows='3' placeholder='Enter Address...'></textarea>
                            </div>
                          </div>
                        </div>
                        <input type='hidden' name='total_price' value='".$total_price."'>

                        <div class='row' style='border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;'>
                        <div class='col'>TOTAL PRICE</div>
                        <div class='col text-right'>&#8377; ".(($total_price) ? $total_price: '00' )."</div>
                        </div>
                        <button type='submit' class='btn btn-dark' ".(($isempty) ? "disabled" : " " ).">CHECKOUT</button>
                        </form>
                </div>
            </div>
            
        </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
</body>
 </html>";


 
 ?>