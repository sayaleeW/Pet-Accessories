<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>Untitled Document</title>
<script type="text/javascript">
function s(id){
document.getElementById("101").value=id;
document.getElementById("102").value=id;
}
</script>
</head>

<body STYLE="background-color:#c13035;">
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
   <!-- <form class=" col-sm-8 col-xs-12 nav-form">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
        <button class="btn btn-default" id="search" type="button">
            <i class="glyphicon glyphicon-search"></i>
        </button>
        </div>
    </div>
    </form>
-->
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
<?php
if(isset($_SESSION["type"])){
  if($_SESSION["type"]=="seller"){
    ?>
<div class="container" style="margin-top:50px;height:100%">
 
  <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4" style="box-shadow:5px 5px 5px  #7a1f22;background-color:#fff">
  <form class="form-horizontal" action="insert.php"  name="form" method="post" enctype="multipart/form-data">
		<h2 class="text-center" >Insert Product Details</h2><hr/>
       <div class="form-group">
         <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" />
       </div>
         <div class="form-group">
         <input type="text" name="description" class="form-control" placeholder="Enter Description" id="description" />
       </div>
  
   <div class="form-group">
         <input type="number" name="price" class="form-control" placeholder="Enter price" id="price" />
       </div>



        <div class="form-group">
         <input type="text" name="info1" class="form-control" placeholder="Enter information " id="info1" />
       </div>


        <div class="form-group">
        <input type="text" name="info2" class="form-control" placeholder="Enter Region " id="info2" />
       </div>

        <div class="form-group">
      <input type="text" name="info3" class="form-control" placeholder="Enter weight " id="info3" />
       </div>

       <div class="form-group">
 
  <select class="form-control" id="sel1" name="sel1">
  <option>Select</option>
    <option>Food</option>
    <option>Ornamental</option>
    <option>Toys</option>
    <option>Cleaning</option>
  </select>
</div>
      

        

  

       <p>image 
         <input  class="btn btn-success" type="file" name="form" id="form"/>
         <br/> <input class="btn" type="submit" name="submit" id="submit" value="Upload"/>
    </p>
</form>
</div></div></div></p>
    <?php
  }
  else{
    echo "Permission Denied";
  }
}
?>

 <?php
 

	//mysqli_select_db("church") or die("kkhdsfd");
	

		
		if(isset($_POST['submit'])){
			$name=$_POST['name'];
			$description=$_POST['description'];
      $price=$_POST['price'];
			$info1=$_POST['info1'];
      $info2=$_POST['info2'];
      $info3=$_POST['info3'];
    $cat = $_POST['sel1'];
     $sid = $_SESSION["id"];
  
			
      


			




	$con1=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");		
	$oldname=$_FILES['form']['name'];
  $newname="".$name.".jpg";		
  $target="img/$newname";
  if(move_uploaded_file($_FILES['form']['tmp_name'],$target))
  {
	$dir="img/".$name.".jpg";
	
	$result1=mysqli_query($con1,"INSERT INTO `pet`(`name`, `descr`, `price`, `img`, `info1`, `info2`, `info3`,  `sid`, `category`)VALUES ('".$name."','".$description."','".$price."','".$dir."','".$info1."','".$info2."','".$info3."','".$sid."','".$cat."')")or die("unable to insert");
	if($result1)
	{
		echo "the product is uploaded successfully";
		
	}
	else
	{
		echo "the product cannot uploaded";
	}
	
  }
	
	
}
else
{
echo "file not uploaded to file";
}	

?>


<p align="left" style="color:#FFF; font-size: medium;">&nbsp;<strong><a href="admin.html"><-- Go back to Admin Panel</a></strong></p>
</body>
</html>