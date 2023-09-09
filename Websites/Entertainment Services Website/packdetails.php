<?php
    include "config.php";
    session_start();

    if($_SESSION["vc_id"]){
        $pid = $conn->real_escape_string($_GET["id"]);
        $sql = "SELECT `pack_name`,`channels` FROM `packs` WHERE `pack_id` = $pid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pack_name = $row["pack_name"];
        }
        $channels =  $row["channels"];
        $channel_ids = implode(',',unserialize($channels));
        $query = "SELECT * FROM `all_channels` WHERE `channel_id` IN ($channel_ids)";
        $result2 = $conn->query($query);

            

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

        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center float-md-none">'.$pack_name.' Pack Channels</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" id="channelSearchInput" oninput="channelSearch()" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap" id="channelTable">
                <thead>
                  <tr>
                    <th>Channel Name</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>';
                if ($result2->num_rows > 0) {
                while($r = $result2->fetch_assoc()){
                    echo '
                  <tr>
                    <td>'.$r["channel_name"].'</td>
                    <td>'.$r["price"].'</td>
                  </tr>';
                }}
                    echo '
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <script>
function channelSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("channelSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("channelTable");
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

    }
$conn->close();
?>
