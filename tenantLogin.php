<?php
//header('Location: HomePage.html');
require_once "assignment_conn.php";

session_start();
if(!empty($_POST["tenantID"]) and !empty($_POST["password"])){
    $tenantID = $_POST["tenantID"];
    $password = $_POST["password"];
    $tenantID = mysqli_real_escape_string($conn,$tenantID);

    $sql = "SELECT name FROM tenant WHERE tenantID = '$tenantID' AND password = '$password'";
    $rs = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if(mysqli_num_rows($rs) > 0) {
        $data = mysqli_fetch_assoc($rs);
        printf ('<script>alert("Welcome Back %s")</script>', $data["name"]);
        if(!isset($_SESSION["tenantID"])){
            $_SESSION["tenantID"] = $tenantID;
        }
        //require ("HomePage.html");
    }
    else{
        echo '<script>
        alert("Please Enter A Correct TenantID and Password");
        window.location.assign("Login.php");
        </script>';
        //echo '<script>alert("Please Enter A Correct TenantID and Password")</script>';
        //@ require_once ("Login.html");
    }
}
else{
    echo '<script>
        alert("Please Enter Both TenantID and Password");
        window.location.assign("Login.php");
        </script>';
    //echo '<script>alert("Please Enter Both TenantID and Password")</script>';
    //@ require_once ("Login.html");
}

?>
<meta http-equiv="refresh" content="0;URL=HomePage.html" />