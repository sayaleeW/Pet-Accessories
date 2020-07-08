<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
    background-color:#f1f1f1;
  }
  .nav-form{
    padding-top:1vh;
}
.navbar{
    background-color: #4CAF50;
    color:#fff;
}
.navbar-inverse .navbar-brand {
    color: #fff;
}
.navbar-inverse .navbar-nav>li>a {
    color: #fff;
}
  .head-det{
      height:300px;
      background-color: #fff;
      border-radius: 10px;
      padding:30px;
      box-shadow: 2px 2px 2px gray;
       
  }
   .head-det2{
      height:200px;
      background-color: #fff;
      border-radius: 10px;
      padding:10px;
      box-shadow: 1px 1px 1px gray;
     

       
  }
  .head-det h4{
      color:gray
  }
  .divi{
    height:100px;
}
 .item-img{
      height:60%;
      background-color: red;  
  }
  .price{
      color:#4caf50;
  }
  </style>  
</head>
<body>
   
  <nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Pet accessories</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
       <!-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
   -->
      </ul>
    <form class=" col-sm-8 col-xs-12 nav-form">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
        <button class="btn btn-default" id="search" type="button">
            <i class="glyphicon glyphicon-search"></i>
        </button>
        </div>
    </div>
    </form>

 <ul class="nav navbar-nav navbar-right">
      
       <?php if(!isset($_SESSION["name"])){
         ?>
        <li><a href="register.php" ><span class="glyphicon glyphicon-user"></span>  Register</a></li>
         <?php
       }
       else{
         
         ?>
        <li><a href="#" ><span class="glyphicon glyphicon-user"></span> 
         <?php
         echo $_SESSION['name'];
       }

       ?>
       </a></li>
      <?php if(!isset($_SESSION["name"])){
         ?>
       <li><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
         <?php
       }
       else{
        
         ?>
         <li><a href="logout.php" ><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
         <?php
       }

       ?>
        
      </ul>
   <!--   <ul class="nav navbar-nav navbar-right">
      
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      -->
    </div>
  </div>
</nav>

<div class="divi"></div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="pwd">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger signup" data-dismiss="modal">Sign Up</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 <?php

 
	

    $con=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");

    $q= $_GET["q"];
	$result1=mysqli_query($con, "SELECT * FROM `pet` where `id` = '".$q."'") or die("Unable to fetch");
    $l=0;
	if($row=mysqli_fetch_array($result1) )
	{
		
	$image=$row['img'];
	$id=$row['id'];
	$name=$row['name'];
	$price = $row['price'];
  $descr = $row['descr'];
  $info1 = $row['info1'];
  $info2 = $row['info2'];
  $info3 = $row['info3'];
 
  
  $sid =$row['sid'];
   
  	$result2=mysqli_query($con, "SELECT * FROM `seller` where `id` = '".$sid."'") or die("Unable to fetch");
if($row=mysqli_fetch_array($result2) )
  {
    $sname =  $row['name'];
    $sadd = $row['add'];
$smail = $row['email'];

  }

	
 
    ?>
<div class="container">
  <div class="head-det">
      <div class="row">
          <div class="col-sm-5 ">
              <div class="item-img wow fadeIn">   <img src="<?php echo $image; ?>"  style="height:250px;width:100%"></div>
          </div>
          <div class="col-sm-7">
              <h2><?php echo $name; ?></h2>
              <h4><?php echo $descr; ?> </h4>
              <h1 class="price"><i class="fa fa-inr"></i> <?php echo $price; ?> /-</h1>
              <?php
              if(isset($_SESSION["name"])) {
              ?>
              <button class="btn btn-warning btn-lg" style="width:300px;" data-toggle="modal" data-target="#myconModal">Buy Now</button>
             <!--<button class="btn btn-warning btn-lg" style="width:150px;">Add to Cart</button> -->
              <?php
              }
              else {
                ?>
                <button class="btn btn-warning btn-lg" style="width:300px;" data-toggle="modal" data-target="#askmodal">Buy Now</button>
              <?php
              }
?>
     

          </div>
      </div>
  </div>
<br/>
<div class="row">
    <div class="col-sm-4">
         <div class="head-det2" style=" overflow-y:auto;">
            <div class="header-details" style="text-align:center"><h3>Details</h3></div>
             <div class="list-group">
                <a href="#" class="list-group-item"><?php echo $info1; ?></a>
                <a href="#" class="list-group-item"><?php echo $info2; ?></a>
                <a href="#" class="list-group-item"><?php echo $info3; ?></a>
               
            </div>
         </div>
    </div>
  <div class="col-sm-8">
         <div class="head-det2">
            <div class="header-details" style="text-align:center"><h3>Seller Information</h3></div>
                <div class="list-group">
                    <a href="#" class="list-group-item">Name: <?php echo $sname; ?></a>
                    <a href="#" class="list-group-item">Address: <?php echo $sadd; ?> </a>
                  
                    <a href="#" class="list-group-item">Email: <?php echo $smail; ?></a>
                    
                </div>
            </div>
  </div>

    </div>
</div>

</div>
<div id="askmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
        <p>Please Login to Buy this product.</p>
       <a class=" btn btn-primary"href="login.php">Login</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="myconModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enter Details </h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
      
        <input type="text" placeholder="Name" class="form-control" value="<?php echo  $_SESSION["name"]; ?>" id="usrname">
      </div>
       <div class="form-group">
     
        <input type="text" placeholder="Address" value="<?php echo  $_SESSION["add"]; ?>" class="form-control" id="add">
      </div>
       <div class="form-group">
       
        <input type="number" placeholder="Mobile Number" class="form-control" id="mo">
      </div>
       <div class="form-group">
       
        <input type="number" placeholder="Quantity" class="form-control" id="quantity">
      </div>
	  <div class="form-group">
       
        Payment : Cash On Delivery 
      </div>
       <input type="hidden" id="id" value = <?php echo $id; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="sub" data-dismiss="modal">Submit</button>
      </div>
    </div>

  </div>
</div>


 <?php
  }
  ?>
<script src="js/app.js"></script>
</body>
</html>