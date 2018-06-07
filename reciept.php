<?php
error_reporting(0);
session_start();
include('connection.php');

$id = $_SESSION['id'];

if ($_SESSION['id'] == "") {
  echo "<script>alert('Login before using this site. Thank you!!')</script>";
  echo "<script>window.location='./login.php';</script>";
}

$sep = $_SESSION['sep_order'];

$strSQL    = "SELECT * FROM mer_user WHERE id  = ?";
$objQuery  = $conn->prepare($strSQL);
$objQuery->bind_param("i",$id);
$objQuery->execute();
$objre = $objQuery->get_result();
$objResult = $objre->fetch_array();

$checkinfo = "SELECT * FROM `mer_data` WHERE id = ?";
$infoquery = $conn->prepare($checkinfo);
$infoquery->bind_param("i",$id);
$infoquery->execute();
$infore = $infoquery->get_result();
$res = $infore->fetch_array();

$reciept = "SELECT *,mer_order.amount as or_amount FROM `mer_order`,`mer_stock` WHERE user_id = ? AND item_id = mID AND status = 2 AND sep_order = ?";
$recieptquery = $conn->prepare($reciept);
$recieptquery->bind_param("ii",$id,$sep);
$recieptquery->execute();
$recieptre = $recieptquery->get_result();
$reresult = $recieptre->fetch_array();

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
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
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
p.test{
    padding-left: 50px;
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
        <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <?php echo $objResult["username"];?></a></li>
      <?php } ?>
    </ul>
  </div>
</nav>

<div align="center">
<div class="reciept" style="border-style: inset; width:60%;">
  <input style="float:right;"  type="image" src="./img/icon.png" alt="Submit" width="60" height="60">
  <br><p align="right" style="padding-right:70px;"class="test">Fake Starbuck Coffee</p>
  <h1>Reciept</h1>
  <br>

  <p align="left" class="test">Order ID : <?php echo $reresult["sep_order"];?></p>
  <p align="left" class="test"><?php echo $res["fullname"];?></p>  
  <p align="left" class="test"><?php echo $res["email"];?></p> 
  <p align="left" class="test"><?php echo $res["address"]; echo "\t"; echo $res["city"]; echo "\t"; echo $res["state"]; echo "\t"; echo $res["zip"];?></p>

<table class="table table-hover">
  <thead> 
    <tr>
      <th>Product Description</th>
      <th style="text-align:center;">Quanitity</th>
      <th style="text-align:center;">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php  
    $recieptquery = $conn->prepare($reciept);
    $recieptquery->bind_param("ii",$id,$sep);
    $recieptquery->execute();
    $recieptre = $recieptquery->get_result();
  while($itemObj = $recieptre->fetch_array()) { ?>
    <tr>
      <td><?php echo $itemObj['name']?></td>
      <td style="text-align:center;"><?php echo $itemObj['or_amount']?></td>
      <td style="text-align:center;"><?php echo $itemObj['price']?> USD</td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<p align="left" style="padding-left:10px;">Total&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
$sum = "SELECT SUM(mer_stock.price) as total FROM mer_order,mer_user,mer_stock WHERE mer_user.id  = $id AND mer_stock.mID = mer_order.item_id AND status = 2 AND sep_order = $sep";
$sumObj = mysqli_fetch_row(mysqli_query($conn, $sum));
echo $sumObj[0]." USD";  
?>
</p>
<p>Take a screenshot of this reciept by yourself :x</p>

</div>

</div>

</div>

 <br><br><br><br><br><br><br>

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
