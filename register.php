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
       <li><a href="register.php" ><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
     
    </div>
  </div>
</nav>


<div class="register col-sm-offset-2 col-sm-3">
<h2>Register as Seller</h2><hr />
<form class="form-horizontal" action="register.php" method="post" name="form" >
      <div class="form-group">
         <input type="text" name="name" class="form-control" placeholder="Enter Name" id="name" />
       </div>
       <div class="form-group">
         <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email" />
       </div>
       <div class="form-group">
         <input type="text" name="add" class="form-control" placeholder="Enter Address" id="add" />
       </div>
       <div class="form-group">
         <input type="text" name="pan" class="form-control" placeholder="Enter Pan Number" id="pan" />
       </div>
 <div class="form-group">
         <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password" />

       </div> <input type="hidden" name="val" value="seller" class="form-control" id="val" />

       <button class="btn col-sm-offset-3 btn-success"  type="submit" name="submit">Register As Seller</button>
       <br/>
       <br/>
       </form>
</div>

<div class="login col-sm-offset-1 col-sm-3">
<h2>Register as User</h2><hr/>
<form class="form-horizontal" action="register.php" method="post" name="form">
<div class="form-group">
         <input type="text" name="name" class="form-control" placeholder="Enter Name" id="name" />
       </div>
       <div class="form-group">
         <input type="text" name="email" class="form-control" placeholder="Enter Email" id="email" />
       </div>
       <div class="form-group">
         <textarea class="form-control" rows="3" name="add" id="add"  placeholder="Enter Address"></textarea>
       </div>
       <div class="form-group">
          <input type="hidden" name="val"  value="user"  class="form-control" id="val" />

       </div>
      <div class="form-group">
         <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password" />
       </div>
       <button class="btn col-sm-offset-3 btn-success" id="regButton" type="submit" name="submit" >Register As User</button>
       <br/>
       <br/>
</form>
</div>
<div class="col-sm-6 col-sm-offset-3">
<div class="php well" style="margin-top:100px; text-align:center ">
<?php

	if(isset($_POST['submit'])){
			
    if($_POST['val']=='seller'){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $add=$_POST['add'];
      $pan=$_POST['pan'];
      $pass=$_POST['password'];
      if($name=='' || $email=='' || $add='' || $pan==''|| $pass=='' ){
        echo "Missing information.. <br/>Please Enter all the fields..";
      }
      else{
      $con1=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");		
	
  
	
	$result1=mysqli_query($con1,"INSERT INTO `seller`( `name`, `email`, `add`, `pan`, `pass`) VALUES ('".$name."','".$email."','".$add."','".$pan."','".$pass."')")or die("unable to insert");
	if($result1)
	{
		echo "the Seller is Registered successfully";
		
	}
	else
	{
		echo "the Seller  cannot be Registered";
	}
      }
    }
    else if($_POST['val']=='user'){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $add=$_POST['add'];
     
      $pass=$_POST['password'];

       if($name=='' || $email=='' || $add='' || $pass=='' ){
        echo "Missing information.. <br/>Please Enter all the fields..";
      }
      else{
      $con1=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");		
	
  
	
	$result1=mysqli_query($con1,"INSERT INTO `user`( `name`,`email`, `address`, `password`) VALUES ('".$name."','".$email."','".$add."','".$pass."')")or die("unable to insert");
	if($result1)
	{
		echo "the User is Registered successfully";
		
	}
	else
	{
		echo "the User  cannot be Registered";
	}
    }
    }
  }

	

?>
</div>
</div>
<script src="js/app.js"></script>
<script>


</script>

</body>
</html>
