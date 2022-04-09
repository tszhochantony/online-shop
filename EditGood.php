<?php
session_start();
require_once "assignment_conn.php";
$gNumber = $_SESSION['goodsNumber'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Good</title>
    <link rel="stylesheet" href="Tenant.css" />
    <style type="text/css">
    #pspace{
        margin-left:200px;
        margin-top: 30px;
    }
    #imgLogo2{
        margin-top:-500px;
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
        Edit Good

    </p>
<?php

if(isset($gNumber)){
    $sql = "SELECT * FROM goods WHERE goodsNumber='$gNumber'";
    $rs = mysqli_query($conn,$sql);
    $rc = mysqli_fetch_assoc($rs);

$form=<<<EOD
        <form action="updateGoods.php" method="POST">
        <p id="pspace">
            <label for="goodsNumber">Goods Number:</label>
            <input type="number" id="goodsNumber" name="goodsNumber" readonly value='%s'>
        </p>
        <p id="pspace">
            <label for="consignmentStoreID">Consignment Store ID:</label>
            <input type="number" id="consignmentStoreID" name="consignmentStoreID" readonly value='%s'>
        </p>
        <p id="pspace"> 
            <label for="goodsName">Goods Name:</label>
            <input type="text" id="goodsName" name="goodsName" readonly value='%s'>
        </p>
        <p id="pspace">
            <label for="stockPrice">Stock Price:</label>
            <input type="number" id="stockPrice" name="stockPrice" min="0" oninput="validity.valid||(value='') value='%s'>
        </p>
        <p id="pspace">
            <label for="remainingStock">Stock Quantity:</label>
            <input type="number" id="remainingStock" name="remainingStock" min="0" value='%s'>
        </p>
        <p id="pspace">
            <label>Status:</label>
            <input type="radio" id="available" name="status" value="1" %s>
            <label for="available">Available</label>
            <input type="radio" id="unavailable" name="status" value="2" %s>
            <label for="unavailable">Unavailable</label>
        </p>

        <p id="pspace"><button type="submit" value="Submit">Update</button> <button type="reset" value="Reset">Reset</button></p>

        </form>
EOD;

printf($form,$rc["goodsNumber"],$rc["consignmentStoreID"],$rc["goodsName"],$rc["stockPrice"],
       $rc["remainingStock"],($rc["status"]=="1"?"Checked='checked'":""),
       ($rc["status"]=="2"?"Checked='checked'":""));
}
?>

    <img id="imgLogo2" src="image/logo5.png"/>
</body>
</html>