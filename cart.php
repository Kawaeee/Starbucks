<?php
error_reporting(0);
include('connection.php');
session_start();

$id = $_SESSION['id'];

$strSQL    = "SELECT * FROM mer_user WHERE id  = ?";
$objQuery  = $conn->prepare($strSQL);
$objQuery->bind_param("i",$id);
$objQuery->execute();
$objre = $objQuery->get_result();
$objResult = $objre->fetch_array();

$sql = "SELECT *,mer_order.amount as or_amount FROM `mer_order`,`mer_stock` WHERE user_id = $id AND item_id = mID AND status = 1";
$query = mysqli_query($conn,$sql);
?>
 
 <html>
  <title>Fake Starbucks Coffee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">                    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="./img/icon.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow">
  <link rel="stylesheet" type="text/css" href="./css/stemp.css">

 <style>
 .btn-success:hover {
   background-color:#006341;
  }
 </style>

<body style="font-family: 'Barlow', sans-serif;">

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

  <form style="margin-top:-0.5%" class="navbar-form navbar-right">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search this site">
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
  </form>

  <ul style="margin-top:-1%" class="nav navbar-nav navbar-right">
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

<br>

<div class="container" style="width:80%; margin-left:140px;"> 
  <table class="table table-hover">
    <thead> 
      <tr>
        <th>Product Description</th>
        <th style="text-align:center;">Quanitity</th>
        <th style="text-align:center;">Price</th>
        <th style="text-align:center;">Action</th>
      </tr>
    </thead>

    <tbody>
    <?php while($obj = mysqli_fetch_array($query)) {
     $num_rows = mysqli_num_rows($query);
    ?>
      <tr>
        <td><?php echo $obj['name']?></td>
        <td style="text-align:center;"><?php echo $obj['or_amount']?></td>
        <td style="text-align:center;"><?php echo $obj['price']?>.00 USD</td>
        <form method="POST" action="./delete.php?mID=<?php echo $obj["mID"]?>">
          <td style="text-align:center; height: 10%;">
            <button type = "submit" style="" class="btn btn-danger" value="delete" onclick ="alert('Deleted <?php echo $obj["name"]?> from your cart.')"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;&nbsp;Remove</button>
          </td>
        </form>
      </tr>

    <?php } ?>

      <tr>
        <td><h4>Total</h4></td>
        <td></td>
        <td style="text-align:center;"> 
        <?php
          $sum = "SELECT SUM(mer_stock.price) as total FROM mer_order,mer_user,mer_stock WHERE mer_user.id  = $id AND mer_stock.mID = mer_order.item_id AND status = 1";
          $sumObj = mysqli_fetch_row(mysqli_query($conn, $sum));
          echo $sumObj[0].".00 USD"; 
        ?>
        </td>
        <td></td>
      </tr>
    </tbody>
  </table>
  
  <br><br><br><br>
  <div style="float:right;">
    <a href="./index.php" class="btn btn-danger"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp; Continue Shopping</a>
    &nbsp;&nbsp;&nbsp;
    <?php if($num_rows <= 0){ ?>
      <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-bitcoin"></span>&nbsp;&nbsp;Let's Grab something before Checkout</a>
    <?php } else { ?>
       <a href="./checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-bitcoin"></span>&nbsp;&nbsp; Proceed to Checkout</a>
    <?php  } ?>
  </div>

</div>

<br><br><br>
 
<div class = "footer">
 <footer class ="footer" style="background-color:#f0f0f0;">

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
