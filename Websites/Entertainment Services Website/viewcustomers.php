<?php
include "adminheader.php";
include "config.php";
session_start();

if($_SESSION["admin"]){
    $sql = "SELECT * FROM `users`";
    $result = $conn->query($sql);

echo '    
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Customers</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" oninput="viewUserSearch()" id="userSearch" class="form-control float-right"
                                placeholder="Search">
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="viewUserTable">
                            <thead>
                                <tr>
                                    <th>User_ID</th>
                                    <th>User Name</th>
                                    <th>VC ID</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>';
                            
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                    echo '
                                <tr>
                                <td><a class="btn btn-link" href="edituser.php?uid='.$row["user_id"].'" >'.$row["user_id"].'</a></td>
                                    <td>'.$row["user_name"].'</td>
                                    <td>'.$row["vc_id"].'</td>
                                    <td>'.$row["mobile_no"].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["address"].'</td>
                                </tr>';}
                            }else{
                                echo "<p>There are no Users currently</p>";
                            }
                                echo '
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script>
function viewUserSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("userSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("viewUserTable");
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
}else{
    header("location:adminlogin.php");
}
$conn->close();
?>