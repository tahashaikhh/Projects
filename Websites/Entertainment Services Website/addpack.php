<?php
include "adminheader.php";
include "config.php";
session_start();

if($_SESSION["admin"]){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pack_name = $conn -> real_escape_string($_POST["pack_name"]);
        $pack_price = $conn -> real_escape_string($_POST["pack_price"]);
        $type = $conn -> real_escape_string($_POST["type"]);
        $channels = $_POST["channel_list"];
        $channels = serialize($channels);
        $sql = "INSERT INTO `packs`( `pack_name`, `pack_price`, `pack_type`, `channels`) VALUES ('$pack_name','$pack_price','$type','$channels')";
        if ($conn->query($sql) === TRUE) {
                echo "<p class='text-center text-sucess'>New Pack created successfully</p>";
          } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
          }

    }
    $sql = "SELECT * FROM `all_channels`";
    $result = $conn->query($sql);



    echo '   
    
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Pack</h1>
                </div>
            </div>
        </div>
    </div>
    
    
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Pack</h3>
                    </div>
                    <form method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="pack_name">Pack Name</label>
                                    <input type="text" class="form-control" id="pack_name" name="pack_name"
                                    placeholder="Enter Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pack_price">Price</label>
                                    <input type="text" class="form-control" id="pack_price" name="pack_price"
                                    placeholder="Enter Price">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                <label for="type">Pack Type</label>
                                <select name="type" id="type" class="form-select">
                                  <option value="broadcast">Broadcast</option>
                                  <option value="channels">channels</option>
                                </select>
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group">

                                <div class="card-tools">
                                            <div class="input-group input-group-sm">
                                                <input type="search" oninput="allChannelsSearch()" id="allChannelsSearchInput" name="table_search" class="form-control float-right"
                                                    placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-default" onClick="allChannelsSearch()">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap" id="allChannelsTable">
                                            <thead>
                                                <tr>
                                                    <th>Channel Name</th>
                                                    <th>Price</th>
                                                    <th>Add</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ';
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result -> fetch_assoc()) {
                                                    echo '
                                                    <tr>
                                                        <td>'.$row["channel_name"].'</td>
                                                        <td>'.$row["price"].'</td>
                                                        <td> <input type="checkbox" name="channel_list[]"
                                                                value="'.$row["channel_id"].'"></td>
                                                    </tr>';}}
                                                    echo '
                                                
                                            </tbody>
                                        </table>
                                    </div>

                               
                                </div>
                                </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function allChannelsSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("allChannelsSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("allChannelsTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
