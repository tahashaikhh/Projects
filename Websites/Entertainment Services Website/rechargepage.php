<?php 

include "config.php";
session_start();

if($_SESSION["channels"]){
    unset($_SESSION["channels"]);
    unset($_SESSION["total_amount"]);
}

if($_SESSION["vc_id"]){
    $sql = "SELECT * FROM `packs` WHERE `pack_type` = 'Broadcast';";
    $sql .= "SELECT * FROM `packs` WHERE `pack_type` = 'Channels';";
    $sql .= "SELECT * FROM `all_channels`;";
    if ($conn -> multi_query($sql)) {

        $broadcast_packs = $conn -> store_result(); 

        if($conn -> more_results()){
            $conn->next_result();
            $channels_pack = $conn->store_result();   
        }


        if($conn -> more_results()){
            $conn->next_result();
            $all_channels = $conn->store_result();   
        }

        if ($result = $conn -> store_result()) {
                while ($row = $result -> fetch_row()) {
                    $name = $row[1];
                    $vc_id = $row[2];
                    $mobile_no = $row[3];
                    $email = $row[4];
                    $address = $row[5];
                }
            }
    }
    $sql = "SELECT `base_price` FROM `static_details`";
        $result2 = $conn->query($sql);
        $b = $result2->fetch_assoc();
        $base_price = $b["base_price"];

echo '
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recharge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminlte.min.css">
</head>

<body>
    <div class="text-center my-3">
        <h3>Recharge Plans</h3>
    </div>

    <div>
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs justify-content-center" id="recharge" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="broadcast-pack-tab" data-toggle="pill" href="#broadcast-pack" role="tab"
                            aria-controls="broadcast-pack" aria-selected="true">Broadcaster Packs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="channel-packs-tab" data-toggle="pill" href="#channel-packs" role="tab"
                            aria-controls="channel-packs" aria-selected="false">Channels Pack</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="all-channels-tab" data-toggle="pill" href="#all-channels" role="tab"
                            aria-controls="all-channels" aria-selected="false">All Channels</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="recharge-category">
                    <div class="tab-pane fade" id="broadcast-pack" role="tabpanel" aria-labelledby="broadcast-pack-tab">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Broadcaster Table</h3>

                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="search" name="table_search" oninput="broadcastSearch()" id="broadcastSearchInput" class="form-control float-right"
                                                    placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap" id="broadcastTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Channels</th>
                                                    <th>Recharge</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <form method="post" action="checkout.php">';
                                            while ($b = $broadcast_packs -> fetch_row()) {
                                                echo '
                                                <tr>
                                                    <td>'.$b["1"].'</td>
                                                    <td>'.$b["2"].'</td>
                                                    <input type="hidden" name="type" value="Broadcast">
                                                    <input type="hidden" name="id" value="'.$b["0"].'">
                                                    <input type="hidden" name="name" value="'.$b["1"].'">
                                                    <input type="hidden" name="amount" value="'.$b["2"].'">
                                                    <td><a class="btn btn-link text-dark" href="packdetails.php?id='.$b["0"].'"
                                                        >
                                                            View Details
                                                        </a>
                                                    </td>
                                                    <td><button type="submit" class="btn btn-dark">Recharge</button>
                                                    </td>
                                                </tr>';}
                                            echo '
                                            </form>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane fade" id="channel-packs" role="tabpanel" aria-labelledby="channel-packs-tab">
                        <div class="row">
                        <div class="col-12">
                        <div class="card">
                            <form method="post" action="alacartesumup.php?type=channelsPack">
                                    <div class="card-header">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark">Recharge</button>
                                    </div>
                                        <h3 class="card-title">Channels Pack Table</h3>

                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="search" name="table_search" oninput="channelsPackSearch()" id="channelsPackSearchInput" class="form-control float-right"
                                                    placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap" id="channelsPackTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Channels</th>
                                                    <th>Recharge</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                        <td>Base Pack</td>
                                                        <td>'.$base_price.'</td>
                                                        <td>Default Pack
                                                    </td>
                                                        <td> <input type="checkbox" name="channelpack_list[]" checked readonly disabled
                                                            ></td>
                                                    </tr>
                                            ';
                                            while ($c = $channels_pack -> fetch_row()) {
                                                echo '
                                                <tr>
                                                    <td>'.$c["1"].'</td>
                                                    <td>'.$c["2"].'</td>
                                                    <input type="hidden" name="type" value="Channels">
                                                    <td><a class="btn btn-link text-dark" href="packdetails.php?id='.$c["0"].'"
                                                        >
                                                            View Details
                                                        </a>
                                                    </td>
                                                    <td> <input type="checkbox" name="channel_list[]"
                                                                value="'.$c["0"].'"></td>
                                                </tr>
                                                ';}
                                                echo '
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="all-channels" role="tabpanel" aria-labelledby="all-channels-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <form method="post" action="alacartesumup.php?type=allChannels">
                                    <div class="card-header">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark">Recharge</button>
                                        </div>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="search" oninput="allChannelsSearch()" id="allChannelsSearchInput" name="table_search" class="form-control float-right"
                                                    placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-default" onClick="allChannelsSearch()">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
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
                                            <tr>
                                                        <td>Base Pack</td>
                                                        <td>'.$base_price.'</td>
                                                        <td> <input type="checkbox" name="channel_list[]" checked readonly disabled
                                                                value=""></td>
                                                    </tr>
                                                ';
                                                while ($a = $all_channels -> fetch_row()) {
                                                    echo '
                                                    <tr>
                                                        <td>'.$a["1"].'</td>
                                                        <td>'.$a["2"].'</td>
                                                        <td> <input type="checkbox" name="channel_list[]"
                                                                value="'.$a["0"].'"></td>
                                                    </tr>';}
                                                    echo '
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="jquery.min.js"></script>
    <script>
    // Show the first tab and hide the rest
    $("#recharge li:first-child a").addClass("active");
    $(".tab-pane").removeClass("show");
    $(".tab-pane:first").addClass("active");
    $(".tab-pane:first").addClass("show");

    $("#recharge li ").click(function() {
        $("#recharge li a").removeClass("active");
        $(this).find("a").addClass("active");
        $("#recharge-category div").removeClass("active");
        $("#recharge-category div").removeClass("show");
        var activeTab = $(this).find("a").attr("href");
        $(activeTab).addClass("show");
        $(activeTab).addClass("active");
        return false;
    });
    </script>

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

<script>
function channelsPackSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("channelsPackSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("channelsPackTable");
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

<script>
function broadcastSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("broadcastSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("broadcastTable");
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>';

    }else{
        header("location:login.php");
    }
    $conn->close();
    ?>