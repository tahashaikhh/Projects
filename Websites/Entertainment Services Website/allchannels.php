<?php
include "adminheader.php";
include "config.php";
session_start();
if($_SESSION["admin"]){
    $sql = "SELECT * FROM `all_channels`";
    $result = $conn->query($sql);
    echo '
    
    
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Channels Pack</h1>
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
                            <a href="addchannel.php" class="btn btn-info text-center">+ Add Channel</a>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" oninput="allChannelsSearch()" id="allChannelsInput" class="form-control float-right"
                                    placeholder="Search">
                                    
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="allChannelsType">
                                <thead>
                                    <tr>
                                        <th>Channel ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                    echo '
                                    <tr>
                                        <td><a class="btn btn-link" href="editchannel.php?cid='.$row["channel_id"].'">'.$row["channel_id"].'</a></td>
                                        <td>'.$row["channel_name"].'</td>
                                        <td>'.$row["price"].'</td>
                                    </tr>';}
                                }
                                   echo '
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
function allChannelsSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("allChannelsInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("allChannelsType");
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
    </html>

    ';
}else{
    header("location:adminlogin.php");
    }
    $conn->close();
?>