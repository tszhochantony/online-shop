<?php
// get stored tenantID
session_start();
// connect to datebase
require_once "assignment_conn.php";

    // setting variables from AddGood.php
    $shop = $_POST["shop"];
    $goodsName = $_POST["goodsName"];
    $stockQuantity = $_POST["stockQuantity"];
    $stockPrice = $_POST["stockPrice"];
    $status = $_POST["status"];

    // erase any special characters
    $goodsName = mysqli_real_escape_string($conn,$goodsName);

    // check if any existing goods is the same in the system
    $sql = "SELECT * FROM goods WHERE consignmentStoreID = '$shop' AND goodsName = '$goodsName' AND stockPrice = '$stockPrice'";
    $rs = mysqli_query($conn,$sql)or die(mysqli_error($conn));

    if(mysqli_num_rows($rs)>0) {
        echo '<script>
        alert("");
        window.location.assign("AddGood.php");
        </script>';
    }else{
        // adding the product in the system
        $sql = "INSERT INTO goods(consignmentStoreID,goodsName,stockPrice,remainingStock,status) VALUES (
            '$shop',
            '$goodsName',
            '$stockQuantity',
            '$stockPrice',
            '$status'
        )";
        $rs = mysqli_query($conn,$sql)or die(mysqli_error($conn));
        // confirmation
        if(mysqli_affected_rows($conn)>0){
            echo '<script>
            alert("A New Good Has Added Into The System");
            window.location.assign("AddGood.php");
            </script>';
        }
    }

    



?>