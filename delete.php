<?php

$orderID = $_POST['orderID'];

require_once "assignment_conn.php";

$sql = "DELETE FROM orders WHERE orderID = '$orderID'";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_affected_rows($conn)>0){
    echo '<script>
        alert("Record Successfully Deleted")
        window.location.assign("DeleteOrder.php");
        </script>';
}else{
    echo "update fail";
}


?>