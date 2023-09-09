<?php
include "adminheader.php";
include "config.php";
session_start();
if($_SESSION["admin"]){
    $sql = "SELECT COUNT(date) FROM recharge_details WHERE month(date)= month(now())-1;SELECT COUNT(vc_id) FROM `users`;";
    if ($conn -> multi_query($sql)) {
        // Store first result set
        if ($result = $conn -> store_result()) {
            $row = $result -> fetch_row();
            $active_user = $row[0];
            $result -> free_result();
        }
        if($conn -> more_results()){
            $conn->next_result();
            $details = $conn->store_result();
            $total = $details -> fetch_row();
            $total_user = $total[0];
        }
    }
    $results_per_page = 12;
    $number_of_page = ceil($number_of_result/$results_per_page);
    if (!isset($_GET['page'])){
      $page = 1;
    }else{
      $page = $_GET['page'];
    }
    $page_first_result = ($page -1 ) * $results_per_page;

    $sql = "SELECT * FROM `recharge_details`  ORDER BY `recharge_id` DESC LIMIT ".$page_first_result.",".$results_per_page;
    $result = $conn->query($sql);
    echo '
    
    <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
    </div>
                    
    <section class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-evenly">
                    
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-bolt"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Active Users</span>
                    <span class="info-box-number">
                        '.$active_user.'
                    </span>
                    </div>
                </div>
            </div>
                
                
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    
                    <div class="info-box-content">
                        <span class="info-box-text">Total Users</span>
                        <span class="info-box-number">
                        '.$total_user.'
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" oninput="rechargeSearch()" id="rechargeSearchInput" class="form-control float-right"
                                placeholder="Search VC ID">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="rechargeTable">
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>VC ID</th>
                                <th>Pack Details</th>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <th>status</th>
                                </tr>
                            </thead>
                            <tbody>';
                            
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                    echo '
                                <tr>
                                    <td>'.$row["customer_name"].'</td>
                                    <td>'.$row["vc_id"].'</td>
                                    <td>'.$row["pack_details"].'</td>
                                    <td>'.$row["amount"].'</td>
                                    <td>'.$row["transaction_id"].'</td>
                                    <td>'.$row["date"].'</td>
                                    <td><a class="btn btn-'.(($row["status"] == "pending") ? "danger" : "success").'" href="markcomplete.php?rid='.$row["recharge_id"].'">'.$row["status"].'</a></td>
                                </tr>';}
                            }else{
                                echo "<p>There are no Users currently</p>";
                            }
                                echo '
                            </tbody>
                        </table>';
                        echo "
                </div>
                    <div class='container table-responsive'>
                    <ul class='pagination justify-content-center'>
                    <li class='page-item ".(($page == 1)? 'disabled' : '')."'><a class='page-link' href='dashboard.php?page=". (($page == 1)? '1' : $page - 1) ."'>Previous</a></li>
                    ";
                    for($page_no = 1; $page_no<= $number_of_page; $page_no++) {  
                     echo " <li class='page-item ".(($page == $page_no)? "active'" : "'")."><a class='page-link' href='dashboard.php?page=". $page_no ."'>". $page_no ."</a></li>";
                    }  
                    echo "<li class='page-item ".(($page == $number_of_page || $number_of_result == $results_per_page)? 'disabled' : '')."'><a class='page-link' href='dashboard.php?page=". (($page == $number_of_page || $number_of_result == $results_per_page)? '' : $page + 1)."'>Next</a></li>
                    </ul>
                  </div>
                ";
                echo '

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function rechargeSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("rechargeSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("rechargeTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
    </body>
    
    </html>';
}
else{
    header("location:adminlogin.php");
}
$conn->close();
?>