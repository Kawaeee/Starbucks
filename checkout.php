<?php
error_reporting(0);
ini_set('display_errors', 'On');
session_start();
include('connection.php');

$id = $_SESSION['id'];

if ($_SESSION['id'] == "") {
  echo "<script>alert('Login before using this site. Thank you!!')</script>";
  echo "<script>window.location='./login.php';</script>";
}

$strSQL    = "SELECT * FROM mer_user WHERE id  = ?";
$objQuery  = $conn->prepare($strSQL);
$objQuery->bind_param("i",$id);
$objQuery->execute();
$objre = $objQuery->get_result();
$objResult = $objre->fetch_array();

$list = "SELECT *,mer_order.amount as or_amount FROM `mer_order`,`mer_stock` WHERE user_id = ? AND item_id = mID AND status = 1";
$listquery = $conn->prepare($list);
$listquery->bind_param("i",$id);
$listquery->execute();
$listre = $listquery->get_result();

$count = "SELECT SUM(mer_stock.price) as total,COUNT(mer_stock.amount) as cart FROM mer_order,mer_user,mer_stock WHERE mer_user.id  = ? AND mer_stock.mID = mer_order.item_id AND status = 1";
$countquery = $conn->prepare($count);
$countquery->bind_param("i",$id);
$countquery->execute();
$countre = $countquery->get_result();
$countsum = $countre->fetch_object();

$checkinfo = "SELECT * FROM `mer_data` WHERE id = ?";
$infoquery = $conn->prepare($checkinfo);
$infoquery->bind_param("i",$id);
$infoquery->execute();
$infore = $infoquery->get_result();
$res = $infore->fetch_array();

$sep = rand(0,100000000);
?>
 
 <html>
  <title>Fake Starbucks Coffee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">                    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="./img/icon.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow">
  <link rel="stylesheet" type="text/css" href="./css/stemp.css">
<style>

.row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
</style>
<body  style="font-family: 'Barlow', sans-serif;">

<nav class="navbar navbar-default">
  <div style="min-height: 10px;background: #006341;"></div>

  <div class="container-fluid">
  <br>

  <div class="navbar-header">
    <form action="./index.php">
    <input style="margin-left:40%"  type="image" src="./img/icon.png" alt="Submit" width="60" height="60">
    </form> 
    
    </div> 
    

    <ul  style="margin-left:4%;margin-top:2%" class="nav navbar-nav">
    <li><a href="#home">Coffee & Tea</a></li>
    <li><a href="#news">Menu</a></li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gift & Merchandise</a>
        <div class="dropdown-menu">
        <ul class="showInColumn">

          <li><a href="#" style="color:black">
              <img src="./img/ABC.png" alt="ABC Collection" style="width:50;height:50;" class="img-responsive center-block">
              ABC Collection
          </a></li>

          <li><a href="#" style="color:black">
              <img src="./img/Banana.png" alt="Banana Collection" style="width:50;height:50;" class="img-responsive center-block">
              Banana Collection
          </a></li>

          <li><a href="#" style="color:black">
              <img src="./img/Harvey.png" alt="Harvey Collection" style="width:50;height:50;" class="img-responsive center-block">
              Harvey the Collection
          </a></li>

          <li><a href="./col_christmas.php" style="color:black">
              <img src="./img/Christmas.png" alt="Christmas Collection" style="width:50;height:50;" class="img-responsive center-block">
              Christmas Collection
          </a></li>

          <li><a href="./col_valentine.php" style="color:black">
              <img src="./img/Valentine.png" alt="Valentine Collection" style="width:50;height:50;" class="img-responsive center-block">
              Valentine Collection
          </a></li>

          <li><a href="#" style="color:black">
              <img src="./img/Peerapat.png" alt="Peerapat Collection" style="width:50;height:50;" class="img-responsive center-block">
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
      <li><a href="./cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; Cart</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; Sign Up</a></li>
      <?php if($id==null){ ?> 
        <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;  Login</a></li>
      <?php }else { ?>
        <li><a href="./logout.php" style="font-weight:bold;"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <?php echo $objResult["username"];?></a></li>
      <?php } ?>
    </ul>

  </div>
</nav>

<div align="center">
    <div style="width:50%;text-align:center;">
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="./isCheckout.php" method="POST">
      
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                    <input type="hidden" name="sep_order" value="<?php echo $sep; ?>">
                                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                    <input type="text" class="form-control" name="fullname" placeholder="Benjamin Velasquez" value="<?php echo $res["fullname"] ?>" required>
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="benque@yahoo.com" value="<?php echo $res["email"] ?>" required>
                                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="7664 Lakewood Street Redford" value="<?php echo $res["address"] ?>" required>
                                    <label for="city"><i class="fa fa-institution"></i> City</label>
                                    <input type="text" class="form-control" name="city" placeholder="Miami" value="<?php echo $res["city"] ?>" required>
                            
                        <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" placeholder="MI" value="<?php echo $res["state"] ?>" required>
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="number" class="form-control" name="zip" placeholder="48239" value="<?php echo $res["zip"] ?>" required>
                            </div>
                        </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" class="form-control"  name="cardname" placeholder="Someone who can pay for you" required>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" class="form-control"  name="cardnumber" placeholder="1111-2222-3333-4444" required>
                            <label for="expmonth">Exp Month</label>
                            <input type="text" class="form-control" name="expmonth" placeholder="April" required>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" class="form-control" name="expyear" placeholder="2020" required>
                                </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control"  name="cvv" placeholder="339" required>
                            </div>
                        </div>
                        </div>
          
                        </div>
                        <br>
                            <input type="submit" class="form-control" value="Continue to checkout" class="btn">
                    </form>
                    </div>
                </div>

            <div class="col-25">
                <div class="container">
                <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $countsum->cart ?></b></span></h4>
                  <?php while($obj = $listre->fetch_array()) { ?>
                   <p><a href="#"><?php echo $obj['name']?></a> <span class="price"><?php echo $obj['price']?>.00 USD</span></p> 
                  <?php } ?>
                 <hr>  
                <p> Total <span class="price" style="color:black"><b><?php echo $countsum->total ?>.00 USD</b></span></p>
            </div>
    </div>
</div>
</div>
<br>
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
    <img  src="./img/starbuck.png" width="40" height="160" >
  </div>

</footer>
</div>

</body>
</html>
