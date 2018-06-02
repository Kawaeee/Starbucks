<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include('connection.php');
?>
 
<html>
  <title>Fake Starbucks Coffee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">                    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="img/icon.png" type="image/png" sizes="16x16">
  <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">

<style>
  ul.dropdown-menu>li {
    text-align: center;
  } 

ul.showInColumn{
    display:block;float:left;
    list-style:none;
    padding:0;margin:0;
    width:470px; 
    padding:2px 0 2px 2px;
}
ul.showInColumn li{
    list-style:none;
    display:block;float:left;
    text-align:center;
    width:150px;
}

.container {
    width: 100%;
    max-width: 1360px;
    margin: 0 auto;
    padding: 0 10px;
    box-sizing: border-box;
}
.column {
    box-sizing: border-box;
    position: relative;
    display: inline-block;
    width: 100%;
    padding: 0 10px;
    vertical-align: top;
    font-family: Lato,Helvetica,Arial,sans-serif;
}

.footer {
    position: absolute;
    bottom:absolute;
    padding: 0;
    padding-bottom:3%;
    border-bottom: 20px;
    margin-right:0%;
    width:100%;
    min-height: 190px;
    background: #f7f7f7;
    color: #382f2d;
    font-size: 1em;
}

</style>

<body  style="font-family: 'Barlow', sans-serif;">


<nav class="navbar navbar-default">
  <div style="min-height: 10px;background: #006341;"></div>

  <div class="container-fluid">
  <br>

  <div class="navbar-header">
    <form action="index.php">
    <input style="margin-left:40%"  type="image" src="img/icon.png" alt="Submit" width="60" height="60">
    </form> 
    
    </div> 
    

    <ul  style="margin-left:4%;margin-top:2%" class="nav navbar-nav">
    <li><a href="#home">Coffee & Tea</a></li>
    <li><a href="#news">Menu</a></li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gift & Merchandise</a>
        <div class="dropdown-menu">
        <ul class="showInColumn">

          <li><a href="#" style="color:black">
              <img src="img/ABC.png" alt="ABC Collection" style="width:50;height:50" class="img-responsive center-block">
              ABC Collection
          </a></li>

          <li><a href="#" style="color:black">
              <img src="img/Banana.png" alt="Banana Collection" style="width:50;height:50" class="img-responsive center-block">
              Banana Collection
          </a></li>

          <li><a href="#" style="color:black">
              <img src="img/Harvey.png" alt="Harvey Collection" style="width:50;height:50" class="img-responsive center-block">
              Harvey the Collection
          </a></li>

          <li><a href="col_christmas.php" style="color:black">
              <img src="img/Christmas.png" alt="Christmas Collection" style="width:50;height:50" class="img-responsive center-block">
              Christmas Collection
          </a></li>

          <li><a href="col_valentine.php" style="color:black">
              <img src="img/Valentine.png" alt="Valentine Collection" style="width:50;height:50" class="img-responsive center-block">
              Valentine Collection
          </a></li>

          <li><a href="#" style="color:black">
              <img src="img/Harvey.png" alt="-- Collection" style="width:50;height:50" class="img-responsive center-block">
              Peerapat Collection
          </a></li>
        </ul>
        </div>
      </li>  
    <li><a href="#about">About us</a></li>
    <li><a href="#customersupport">Customer Support</a></li>
    </ul>
    <form  style="margin-top:-0.5%" class="navbar-form navbar-right">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search this site">
      </div>
      <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
    </form>
    <ul  style="margin-top:-1%" class="nav navbar-nav navbar-right">
      <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>

  </div>
</nav>

 <div style="width:100%;text-align:center;">
  <img src="img/index1.jpg" style="margin-top:-2%;">
  <img src="img/index2.jpg" style="margin-top:-2%;">
 </div>
 
 
 <div class = "footer">
 <footer class ="footer" style="background-color:#f0f0f0 ;">
  <div class="col-sm-2" style="margin-left:5%; margin-top:3%"> 
    <h5><b>ABOUT US</b></h5>
    <p>Our Company
    <p>Investor Relations
    <p>Newsroom
  </div>

  <div class="col-sm-2" style="margin-top:3%"> 
    <h5><b>CAREER CENTER</b></h5>
    <p>Working at Starbuck
    <p>College Plan
    <p>Current Partners
    <p>Corporate Careers
    <p>Manufacturing and Distribution
    <p>Retail Careers
    <p>International Careers
  </div>

  <div class="col-sm-2" style="margin-top:3%"> 
    <h5><b>FOR BUSINESS</b></h5>
    <p>Office Coffee
    <p>Starbucks Coffee International
    <p>Foodservice
    <p>Licensed Stores
    <p>Starbucks Card Corporate Sales
    <p>Landlord Support Center
    <p>Suppliers
  </div>

  <div class="col-sm-2" style="margin-top:3%"> 
    <h5><b>ONLINE COMMUNITY</b></h5>
    <p>Twitter
    <p>Facebook
    <p>Instagram
    <p>LinkedIn
    <p>Pinterest
    <p>YouTube
    <p>My Starbucks Idea
  </div>

  <div class="col-sm-2" style="margin-top:3%"> 
    <h5><b>QUICK LINKS</b></h5>
    <p>My Account
    <p>Store Locator
    <p>Nutrition Info
    <p>Customer Service
  </div>

  <div class="col-sm-1" style="text-align:right;margin-top:2%;"> 
    <img  src="img/starbuck.png" width="40" height="160" >
  </div>

</footer>
</div>

</body>
</html>
