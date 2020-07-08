<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SearchPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>  
  <style>
  
.divi{
    height:100px;
}
  .item{
      background-color: #fff;
      width:95%;
      height: 320px;
      margin-top:50px;
      box-shadow: 2px 2px 2px gray;
      overflow:hidden;
     
  }
   a{
      color:black
  }
  .item-img{
      height:60%;
      background-color: red; 
       
  }
  .item-name{
      height:25%;      
   
      font-size: large;
      padding: 5px;  
  }
  .price-btn{
      height:15%;
      font-size: large;
      width: 100%;
      border-radius:0px;
  }
  .item-img:hover{
    opacity: 0.8;
    -moz-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
 
}
  </style>
</head>
<body>
<?php

 
	

    $con=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");

    $q= $_GET["q"];
    $cat = $_GET["cat"];
	$result1=mysqli_query($con, "SELECT * FROM `pet` where `name` like '%".$q."%' and `category` like '".$cat."%' order by `id` desc") or die("Unable to fetch");
    $l=0;
	while($row=mysqli_fetch_array($result1) )
	{
		
	$image[]=$row['img'];
	$id[]=$row['id'];
	$name[]=$row['name'];
	$price[] = $row['price'];
	$l++;

	}
    ?>
    
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
<div class="row">
<div class="category container" >
<button class="btn btn-default col-sm-3" id="btnCoin">Food</button>
<button class="btn btn-default col-sm-3" id="btnArtifact">Ornamental</button>
<button class="btn btn-default col-sm-3" id="btnWeapon">Toys</button>
<button class="btn btn-default col-sm-3" id="btnOrnament">Cleaning</button>
</div>
</div>
<div class="container">
    <?php
    $i=0;
    
    while($i<$l)
					{	
					?>
    <div class="col-sm-3">
        <a href="productpage.php?q=<?php echo $id[$i]; ?>">
        <div class="item wow fadeIn ">
            <div class="item-img">  
                <img src="<?php echo $image[$i] ?>" style="height: 100%;width:100%">
            </div>    
            <div class="item-name text-center"><?php echo $name[$i]; ?> </div>
            <div class="price-btn btn btn-success"><?php echo $price[$i] ?></div>
        </div>
        </a>
    </div>
<?php
$i++;
                    }
    ?>
  
</div>


<br/><Br/>




<script src="js/app.js"></script>
<script>
$('#btnCoin').click(function(){
   document.location.href = "searchpage.php?q=&cat=Food";
});
$('#btnArtifact').click(function(){
   document.location.href = "searchpage.php?q=&cat=Ornamental";
});
$('#btnWeapon').click(function(){
   document.location.href = "searchpage.php?q=&cat=Toys";
});
$('#btnOrnament').click(function(){
   document.location.href = "searchpage.php?q=&cat=Cleaning";
});
</script>
</body>
</html>
