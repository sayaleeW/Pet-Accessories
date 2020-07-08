<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>  
</head>
<body>
     <style>
     body{
       background-color:#993366
     }
     .register  , .login{
         box-shadow:2px 2px 2px gray;
         background-color:#fff;
         margin-top:100px;
        
         
     }
     .register>h2  , .login>h2
        {
           text-align:center; 
           border-bottom:1px solid black
        }   
        .navbar{
          background: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8));
        }
     </style>
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
        if($_SESSION["type"]=="seller"){
            ?>
             <li><a href="admin.php" ><span class="glyphicon glyphicon-log-in"></span> Admin</a></li>
            <?php
        }
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


<div class="register col-sm-offset-4 col-sm-4">
<h2>Login</h2>
      <form class="form-horizontal" action="login.php" method="post" name="form" >

       <div class="form-group">
         <input type="text" name="email" class="form-control" placeholder="Enter Email" id="email" />
       </div>
       <div class="form-group">
         <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password" />
       </div>

<div class="form-group">
 
  <select class="form-control" name="sel1" id="sel1">
    <option>Select</option>
    <option>user</option>
    <option>seller</option>
    
  </select>
</div>
       <button class="btn col-sm-offset-3 col-sm-6 btn-success" type="submit" name="submit">Login</button>
       <br/>
    </form>
       <br/> <br/>
</div>

<div class="col-sm-6 col-sm-offset-3">
<div class="php well" style="margin-top:100px; text-align:center ">
<?php

	if(isset($_POST['submit'])){
			
    if($_POST['sel1']=='seller'){
     
      $email=$_POST['email'];
      $pass=$_POST['password'];
      $con1=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");		
	$result1=mysqli_query($con1,"SELECT * FROM `seller` WHERE `email`= '".$email."' and `pass`='".$pass."'")or die("No Seller found");
	if($row=mysqli_fetch_array($result1))
	{
		 
     $_SESSION["name"] = $row['name'];
    $_SESSION["id"] = $row['id'];
      $_SESSION["type"] = "seller";
      $_SESSION["add"] = $row['add'];
    echo "Login successful";
		
	}
	else
	{
		 echo "Invalid Username or password";
	}
    }
    else if($_POST['sel1']=='user'){
     $email=$_POST['email'];
      $pass=$_POST['password'];
      $con1=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");		
	$result1=mysqli_query($con1,"SELECT * FROM `user` WHERE `email`= '".$email."' and `password`='".$pass."'")or die("No Seller found");
	if($row=mysqli_fetch_array($result1))
	{
		 
     $_SESSION["name"] = $row['name'];
    $_SESSION["id"] = $row['id'];
     $_SESSION["type"] = "user";
    $_SESSION["add"] = $row['address'];
     echo "Login successful <br/>You are redirected to the index page";
		?>
      <script>
      setTimeout(function(){
        location.href="index.php";
      },2000);
      </script>
    <?php	
	}
	else
	{
		 echo "Invalid Username or password";
	}
    }
  }
		





	
	

?>
</div>
</div>
<script src="js/app.js"></script>
</body>
</html>
