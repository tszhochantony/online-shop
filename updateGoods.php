<?php

$goodsNumber = $_POST['goodsNumber'];
$stockPrice = $_POST["stockPrice"];
$remainingStock = $_POST["remainingStock"];
$status = $_POST["status"];

require_once "assignment_conn.php";

$sql = "UPDATE goods SET
                                stockPrice='$stockPrice',
                                remainingStock='$remainingStock',
                                status='$status'
                                WHERE goodsNumber='$goodsNumber'
";

mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_affected_rows($conn)>0){
    echo '<script>
        alert("Record Successfully Updated")
        window.location.assign("ViewGood.php");
        </script>';
}else{
    echo "update fail";
}

?>