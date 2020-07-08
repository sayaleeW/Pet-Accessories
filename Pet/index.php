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
    <script src="img/qq.jpg"></script>  
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
    <section class="header">
    
            <div class="col-sm-9" >
                <div class="slider">
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" >
    <div class="item active">
      <img class="img img-responsive" style="background:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)); height:350px;width:100%"src="img/222.jpg" alt="Chania">
       <div class="carousel-caption" >
        <h2>Affordable </h2>
      
      </div>
    </div>

    <div class="item">
      <img  class="img img-responsive" style="height:350px;width:100%"  src="img/121.jpg" alt="Chania">
     <div class="carousel-caption" >
        <h2>Best Quality </h2>
      
      </div>
    </div>

    <div class="item">
      <img class="img img-responsive"style="height:350px;width:100%" src="img/21.jpg" alt="Flower">
   <div class="carousel-caption" >
        <h2>Shops all around the city </h2>
      
      </div>
    </div>

    <div class="item">
      <img class="img img-responsive"style="height:350px;width:100%" src="img/111.jpg" alt="Flower">
       <div class="carousel-caption" >
        <h2>Best Products Guaranteed</h2>
      
      </div>
    </div>
 
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





                </div>

            </div>
            <div class="col-sm-3">
                <div class="login-head">
                  <img src="http:img/00.jpg" style="height:100%;width:100%"/>
                  <!--
                    <div class="login-head-text well-sm">
                        <h3>You are Welcome</h3>
                    </div>
                    <br/>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <input type="text" class="form-control" placeholder="Enter Your Name" id="usr">
                    </div>
                    <div class="form-group col-sm-10 col-sm-offset-1">
                        <input type="email" class="form-control" placeholder="Enter Your Email" id="email">
                    </div>
                     <div class="form-group col-sm-10 col-sm-offset-1">
                        <input type="password" class="form-control" placeholder="Enter Your Password" id="pass">
                    </div>
                   <div class="form-group col-sm-10 col-sm-offset-1">
                        <select class="form-control" id="sel1">
                            <option>Mumbai</option>
                            <option>Navi Mumbai</option>
                            <option>Mumbai Suburbs</option>
                          
                        </select>
                        </div>
                   <button class="btn btn-danger index-login col-sm-10 col-sm-offset-1">Sign Up</button>
                   -->
                </div> 
            </div>
       
    </section> 
    <section  class="offer">
      <h2 class="text-center">Best of Ours</h2>
      <div class="container">
        <a href="searchpage.php?q=&cat=Food">   <div class="col-sm-3">
        <div class="box">
          <div class="box-img">
            <img src="img/a1.jpg" width="100%" height="100%" />
          </div>
          <div class="heading">Food</div>
            <div class="by">Food for Pets </div>
            <div class="details">
             <span class="number-users"> <i class="fa fa-users" aria-hidden="true"></i>800 Sold</span>
            </div>
        </div>
        </a>
      </div>
       <div class="col-sm-3">
        <a href="searchpage.php?q=&cat=Ornamental">
        <div class="box">
          <div class="box-img">
            <img src="img/a.jpg" width="100%" height="100%" />
          </div>
          <div class="heading">Ornamental Assecessories  </div>
            <div class="by">For Pets</div>
            <div class="details">
             <span class="number-users"> <i class="fa fa-users" aria-hidden="true"></i>120 Sold</span>
            </div>
        </div>
        </a>
      </div>
       <div class="col-sm-3">
       <a href="searchpage.php?q=&cat=Toys">
        <div class="box">
          <div class="box-img">
            <img src="img/a2.jpg" width="100%" height="100%" />
          </div>
          <div class="heading">Toys</div>
            <div class="by">Toys for your Pets</div>
            <div class="details">
             <span class="number-users"> <i class="fa fa-users" aria-hidden="true"></i>580 Sold</span>
            </div>
        </div>
        </a>
      </div>
       <div class="col-sm-3">
       <a href="searchpage.php?q=&cat=Cleaning">
        <div class="box">
          <div class="box-img">
            <img src="img/q11.jpg" width="100%" height="100%" />
          </div>
          <div class="heading">Cleaning</div>
            <div class="by">Cleaning your pets with our product</div>
            <div class="details">
             <span class="number-users"> <i class="fa fa-users" aria-hidden="true"></i>800 Sold</span>
            </div>
        </div>
        </a>
      </div>
      
      </div>
    </section>
      <section  class="offers1">
      
          
     

    </section>
     <section class="contact">
     <div class="container">
       <div class="row ">
         <div class="col-sm-6">
           <div class="ContactUs "><h1>Contact Us</h1></div>
           <br/>
           <h4><B>Name</b> : Sayalee Prakash Wadekar</h4>
           <h4><b>Mo.No.</b> : 9967972271 / 1800 0520 666</h4>
            <h4><b>Email Id</b>: sai@gmail.com</h4>
            <h4><b>Address </b>: VJTI College Mumbai.</h4>
         </div>
          <div class="col-sm-6">
                 <img src="img/w1.jpg" width="100%" height="250px" />
       </div>
     </div>
   </section>
    <section  class="offers2" style="background-color:#000 !important;height:50px;">
      
          
      

    </section>
  
<script src="js/app.js"></script>
</body>
</html>
