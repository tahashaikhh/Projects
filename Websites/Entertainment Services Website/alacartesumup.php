<?php

    include "config.php";
    session_start();
    $type = $_GET["type"];
    if($_SESSION["vc_id"]){
        if($type=="allChannels"){

            $channels = $_POST["channel_list"];
            $query = "SELECT `channel_name`,`price` FROM `all_channels` WHERE `channel_id` IN (".implode(',',$channels).")";
            $sql = "SELECT `base_price` FROM `static_details`";
            $result2 = $conn->query($sql);
            $b = $result2->fetch_assoc();
            $base_price = $b["base_price"];
            $total_amount = $base_price;
            $count = 0;
            $result = $conn->query($query);
            $_SESSION["channels"]["name0"] = "Base Pack";
            $_SESSION["channels"]["price0"] = $base_price;
            while($r = $result->fetch_assoc()){
                $_SESSION["channels"]["name".++$count] = $r["channel_name"];
                $_SESSION["channels"]["price".$count] = $r["price"];
                $total_amount += $r["price"];
            }
            $_SESSION["total_amount"] = $total_amount;
            header("location:checkout.php?type=all");
        }elseif ($type=="channelsPack") {
            $channelpack = $_POST["channel_list"];
            $query = "SELECT `pack_name`, `pack_price` FROM `packs` WHERE `pack_id` IN (".implode(',',$channelpack).")";
            $sql = "SELECT `base_price` FROM `static_details`";
            $result2 = $conn->query($sql);
            $b = $result2->fetch_assoc();
            $base_price = $b["base_price"];
            $total_amount = $base_price;
            $count = 0;
            $result = $conn->query($query);
            $_SESSION["channels"]["name0"] = "Base Pack";
            $_SESSION["channels"]["price0"] = $base_price;
            while($r = $result->fetch_assoc()){
                $_SESSION["channels"]["name".++$count] = $r["pack_name"];
                $_SESSION["channels"]["price".$count] = $r["pack_price"];
                $total_amount += $r["pack_price"];
            }
            $_SESSION["total_amount"] = $total_amount;
            header("location:checkout.php?type=channelpack");
        }
    }
    $conn->close();
?>