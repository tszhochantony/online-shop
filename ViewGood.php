<?php
// get tenantID
session_start();
// connect to database
require_once "assignment_conn.php";
// search database with tenantID
if(isset($_SESSION["tenantID"])){
$tenantID = $_SESSION["tenantID"];
$sql ="SELECT consignmentStoreID from consignmentStore WHERE tenantID = '$tenantID'";
$rs = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($rs) > 0) {
    $data = mysqli_fetch_assoc($rs);
}
$cStoreID = $data["consignmentStoreID"];
//search goods with the consignmentStoreID according to tenantID
$sqc = "SELECT * from goods WHERE consignmentStoreID = '$cStoreID'";
$rd = mysqli_query($conn,$sqc) or die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Good</title>
    <link rel="stylesheet" href="Tenant.css" />
    <style type="text/css">
    .update img{
        width:25%;
        length:25%;
    }
    .Record{
        margin-left:250px;
    }
    </style>
</head>
<body>
    <div id="flex-container">
        <a href="HomePage.html"><img class="logo" src="image/logo4.png" alt="logo"/></a>
        <h1>HKCS Online</h1>
        <h2>Everything you want in here</h2>
    </div>
    <div id="flex-container3">
        <p id="btn">
            <a href="Login.php"><button id="test">Login</button></a>
            <a href="Register.html"><button id="test">Register</button></a>
        </p>
        <p id=add>
            Search product name:
            <input type="text" value="mask">
            <button type="button" id="searchProduct"><img id="searchIcon" src="image/search.png" /></button>
            Search by shop:
            <select>
                <optgroup>
                <option>Sha Tin</option>
                </optgroup>
                </select>
        </p>
    </div>
    <div class ="flex-container2">
        <a href="HomePage.html">HomePage</a>
        <div class="dropdown">
            <button class="dropbtn">Tenant</button>
            <div class="dropdown-content">
              <a href="DeleteOrder.php">Delete Order</a>
              <a href="Report.php">Report</a>
              <div class="asd">
              <a href="Report.php">Modify Good</a>
                <div class="asdd">
                  <a href="AddGood.php">Add Good</a>
                  <a href="ViewGood.php">View Good</a>
                </div>
            </div>
          </div>
        </div>  
        <a href="UpdateProfile.html">Update Profile</a>
        <a href="CheckOrder.html">Check Order</a>
     </div>

    <p class="title">
        View Good
    </p>
    <table class="Record">
        <tr>
            <th>Edit</th>
            <th>Good Number</th>
            <th>Consignment StoreID</th>
            <th>Goods Name</th>
            <th>Stock Price</th>
            <th>Remaining Stock</th>
            <th>Status</th>
        </tr>
        <?php
        if(isset($_SESSION["tenantID"])){
            $i=0;
            if(mysqli_num_rows($rd)>0){
                while($rc = mysqli_fetch_assoc($rd)){
        
        ?>    
            <tr>
            <?php
                printf("<td><div class='update'><a href='ViewGood.php?goodsNumber=%s'><img src='image/update.png' /></a></div></td>",$rc["goodsNumber"]);
            ?>
                <td><?php echo$rc["goodsNumber"]?></td>
                <td><?php echo$rc["consignmentStoreID"]?></td>
                <td><?php echo $rc["goodsName"]?></td>
                <td><?php echo $rc["stockPrice"]?></td>
                <td><?php echo $rc["remainingStock"]?></td>
                <td>
                <input type="radio" name="status<?php echo $i?>" readonly value="1"
                <?php
                    if($rc["status"] == "1"){
                        echo "checked=\"checked\"";
                    }
                ?>
                /><label>Available</label>

                <input type="radio" name="status<?php echo $i?>" readonly value="2"
                <?php
                    if($rc["status"] == "2"){
                     echo "checked=\"checked\"";
                 }
                ?>
                /><label>Unavailable</label>
             </td>
             </tr>


        <?php
        $i++;
                }
            }else{
                "no result is found";
            }
?>

    </table>
<?php
if(isset($_GET["goodsNumber"])){
    $_SESSION["goodsNumber"] = $_GET["goodsNumber"];
    echo '<script>
        window.location.assign("EditGood.php");
        </script>';
}
        }

?>
</body>
</html>
