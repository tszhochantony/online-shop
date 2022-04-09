
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
              <a href="Report.html">Report</a>
              <div class="asd">
              <a href="Report.html">Modify Good</a>
                <div class="asdd">
                  <a href="AddGood.php">Add Good</a>
                  <a href="ViewGood.php">View/Edit Good</a>
                </div>
            </div>
          </div>
        </div>  
        <a href="UpdateProfile.html">Update Profile</a>
        <a href="CheckOrder.html">Check Order</a>
     </div>

     <form action= "tenantLogin.php" method="POST">
    <p class="title">
        Login
    </p>
    <p >
    <pre class="login2">
        TenantID:
        <input type="text" id="tenantID" name="tenantID">
         

        Password :
        <input type="text" id="password" name="password">
    </pre>
    <input type="submit" id="btnLogin1" value="login" >
    <input type="reset"  id="btnLogin2" value="reset">
    </p>
    </form>
    <img id="imgLogo" src="image/logo5.png"/>
</body>
</html>