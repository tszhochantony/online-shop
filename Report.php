<?php
session_start();
require_once "assignment_conn.php";
if(isset($_SESSION["tenantID"])){
$tenantID = $_SESSION["tenantID"];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="Tenant.css" />
    <style type="text/css">
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
        Order Record
    </p>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Shop Address</th>
                <th>Goods Number</th>
                <th>Goods Name</th>
                <th>Quantity</th>
                <th>Order Status</th>
                <th>Selling Price</th>
                <th>Total Price</th>
            </tr>
        
        <?php
        $sql="SELECT o.orderID,co.ConsignmentStoreName,ss.address,o.orderDateTime,
                   g.goodsNumber,g.goodsName,g.stockPrice,m.quantity,o.status,o.totalPrice,
                   c.customerEmail, c.firstName, c.lastName FROM orders o 
             left outer join orderitem m on o.orderID = m.orderID
             left outer join customer c on c.customerEmail = o.customerEmail
             left outer join consignmentStore co on co.consignmentStoreID = o.consignmentStoreID
             left outer join shop ss on o.shopID =ss.shopID
             left outer join goods g on g.goodsNumber = m.goodsNumber
             WHERE co.tenantID='$tenantID' ORDER BY o.orderDateTime DESC" ;
        $rs=mysqli_query($conn,$sql) or die (mysqli_error());
        $multi = "";
        while($rc=mysqli_fetch_assoc($rs)){
            // if($multi==$rc["orderID"]){
            //     printf('<script>
            //     var quantite = document.getElementById("quantite");
            //     var goodsNum = document.getElementById("goodsNum");
            //     var goodsName = document.getElementById("goodsName");
            //     var goodsPrice = document.getElementById("goodsPrice");
            //     quantite.textContent += "  {%s}";
            //     goodsNum.textContent += "   {%s}";
            //     goodsName.textContent += "   {%s}";
            //     goodsPrice.textContent += "  {%s}";
            //     </script>',$rc["quantity"],$rc["goodsNumber"],$rc["goodsName"],$rc["stockPrice"]);
            // }
            // else{
            //     $multi = $rc["orderID"];    
        ?>
        <tr>
            <td><?php echo $rc["orderID"]?></td>
            <td><?php echo $rc["orderDateTime"]?></td>
            <td><?php echo $rc["customerEmail"]?></td>
            <td><?php echo $rc["lastName"].$rc["firstName"]?></td>
            <td><?php echo $rc["address"]?></td>
            <td id="goodsNum"><?php echo $rc["goodsNumber"]?></td>
            <td id="goodsName"><?php echo $rc["goodsName"]?></td>
            <td id="quantite"><?php echo $rc["quantity"]?></td>
            <td><?php echo $rc["status"]?></td>
            <td id="goodsPrice"><?php echo $rc["stockPrice"]?></td>
            <td><?php echo $rc["totalPrice"]?></td>
        </tr>
              
        <?php
        
            }
        //}
        
    ?>
    
            
        





   
            
        </table>
</body>
</html>
