<?php
error_reporting(0);
session_start();
include('connection.php');

$id = $_SESSION['id'];
$strSQL    = "SELECT * FROM mer_user WHERE id  = $id";
$objQuery  = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

$colsql = "SELECT * FROM mer_stock WHERE collection = 'valentine' ";
$colquery = mysqli_query($conn,$colsql);

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
              <img src="./img/Harvey.png" alt="-- Collection" style="width:50;height:50;" class="img-responsive center-block">
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

<div  style="margin-top:-2%; margin-left:0%" class="container"> 

<div class="page-header" Style="margin-left:5%; margin-right:5%;" >
    <h3><b>Gift & Merchandise : </b>Valentine Collection</h3> 
</div>   


<ul class="showInColumn2">
  
  <?php while($obj = mysqli_fetch_array($colquery)) {
  
  ?>
     
    <li>
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo $obj['name']?></div>

      <div class="panel-body">
        <div style="text-align:center;">
          <img src=<?php echo "img/".$obj['image'] ?> style="width:50%;"  width="150" height="150" alt="Image">
          <br>
        </div>
        Description : <?php echo $obj['description']?>
      </div>

      <div class="panel-footer"><?php echo $obj["price"]." USD" ?>
      <ul class="nav navbar-nav navbar-right">
      <form method="POST" action="./addtocart.php?mID=<?php echo $obj["mID"]?>">
      <button class="btn btn-link" type="submit" value="Add to Cart" onclick ="alert('Added <?php echo $obj["name"]?> to your cart.')">
          <div style="margin-top:-7%">
            <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Add to cart
          </div>
      </button>
      </form>
      </ul>
    </div>

    </div>
    </li>

    <?php
    }
    ?>

</ul>

</div>

<br>

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

<?php
$colquery->close();
$conn->close();
?>