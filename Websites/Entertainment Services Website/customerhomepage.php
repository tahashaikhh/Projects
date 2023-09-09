<?php 

    include "config.php";
    session_start();

    if($_SESSION["vc_id"]){
        $vc = $_SESSION["vc_id"];
        $sql = "SELECT * FROM `users` WHERE `vc_id` = $vc;";
        $sql .= "SELECT * FROM `recharge_details` WHERE `vc_id` = '$vc' ORDER BY `recharge_id` DESC LIMIT 0,5;";
        $sql .= "select date, DATEDIFF(now(), date) AS diff from recharge_details where month(date)= month(now())-1 AND `vc_id` = '$vc';";
        if ($conn -> multi_query($sql)) {
              // Store first result set
              if ($result = $conn -> store_result()) {
                    while ($row = $result -> fetch_row()) {
                        $name = $row[1];
                        $vc_id = $row[2];
                        $mobile_no = $row[3];
                        $email = $row[4];
                        $address = $row[6];
                    }
               $result -> free_result();
                }
              
              if($conn -> more_results()){
                  $conn->next_result();
                  $recharge_details = $conn->store_result();
                  
              }

              if ($conn -> more_results()) {
                    //Prepare next result set
                    $conn -> next_result();
                    $result = $conn->store_result();
                    $row = $result -> fetch_row();
                    $last_recharge = $row[0];
                    if($last_recharge){

                        $date=date_create($last_recharge);
                        $last_recharge = date_format($date,"d/m/Y");
                    }
                    $days_left = (int)$row[1];
                    $result->free_result();
                }
        }
          
        $conn->close();
        $r = $recharge_details -> fetch_row();

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
        background: #253238;
        background: -webkit-linear-gradient(to right bottom, #3F4D5A, #253238);
        background: linear-gradient(to right bottom, #3F4D5A, #253238)
    }
    </style>
</head>

<body>
    
    <div>
        <div class="col-5 d-flex float-right justify-content-center my-2">
            <a class="text-danger" href="logout.php">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </div>
    <section style="background-color: #f4f5f7;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="avator.avif" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <h5>'.$name.'</h5>
                                <a class="text-white" href="editcustomerpage.php?vc='.$vc_id.'"><i class="fa-regular fa-pen-to-square"></i></a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                        <h6>VC ID</h6>
                                        <p class="text-muted">'.$vc_id.'</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">'.$mobile_no.'</p>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">'.$email.'</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Address</h6>
                                            <p class="text-muted">'.$address.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    
    <div class="row justify-content-around">
        
        <div class="col-6 col-md-3 text-center">
            <input type="text" class="knob '.(($days_left  < 5) ? 'text-danger' : 'text-dark').'" value="'.(($days_left == 0) ? 0 : (($days_left <= 28) ? 28-$days_left : 0) ).'" data-width="90" data-height="90" disabled>
            
            <div class="text-xs knob-label font-weight-bold text-dark text-uppercase">Days Left</div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body ">
                <div class="row no-gutters align-items-center callout callout-info">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Last Recharge on</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">'.(($last_recharge) ? $last_recharge : (($r) ? $r[6] : "There is no rechare until now")).'</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    <div class="row">
        <div class="col-md-2 m-auto">
            <a href="rechargepage.php" class="btn btn-block btn-outline-dark btn-flat mb-4">Recharge Now</a>
        </div>
    </div>
    
    <div class="card">
        <h3 class="card-title text-center my-2"><b>Recharge History</b></h3>
        <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th scope="col">VC ID</th>
                    <th scope="col">Pack Details</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>';
            if($r){

                do{
                    echo '
                    <tr>
                    <th scope="row">'.$r[2].'</th>
                    <td>'.$r[3].'</td>
                    <td>'.$r[4].'</td>
                    <td>'.$r[5].'</td>
                    <td>'.$r[6].'</td>
                    </tr>';
                }while ($r = $recharge_details -> fetch_row());
            }else{
                echo '<tr><td colspan="5">There are no recharge history</td></tr>';
            }
                echo '
            </tbody>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<!-- jQuery -->
<script src="jquery.min.js"></script>
<!-- jQuery Knob -->
    <script src="jquery.knob.min.js"></script>
    <script>
        $(function() {
        /* jQueryKnob */
        
        $(".knob").knob({
            "readOnly": true,
            "min": 0,
            "max":28
        })
        
    })
</script>
</body>
</html>';
$recharge_details->free_result();
}else{
    header("location:login.php");
}
$conn->close();
?>