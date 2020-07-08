<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color:  #f2f2f2;
}
</style>
</head>
<body>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Please enter your password</h4>
        </div>
        <div class="modal-body">
          <p>Unauthorized Access is prohibited.</p>
          <div class="form-group">
            <input type="password" class="form-control" id="pass">
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default password" data-dismiss="modal">Log In</button>
        </div>
      </div>
      
    </div>
  </div>
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
  <!--  <form class=" col-sm-8 col-xs-12 nav-form">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
        <button class="btn btn-default" id="search" type="button">
            <i class="glyphicon glyphicon-search"></i>
        </button>
        </div>
    </div>
    </form> -->

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
             <li><a href="insert.php" ><span class="glyphicon glyphicon-log-in"></span> Add new Product</a></li>
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
<div class="jumbotron text-center" style="background-color:#4CAF50;color:#fff;">
  <h1>Accounts</h1>
   
</div>
 <div class="container">
 <div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" id="sel1">
  <option>Select from List</option> 
   <option>All</option>
    <option>Previous-Year</option>
    <option>Previous-Month</option>
    <option>Current-Month</option>
    
  </select>
</div>

<table class="tab">
  <tr>
  <th>Id</th>
    <th>Name</th>
    <th>Address</th>
    <th>Contact</th>
     <th>Product Id</th>
    <th>Quantity</th>
    <th>Amount</th>
  </tr>
 
 
</table>

</div>
<script>
$('.tab').hide();
$('.password').click(function(){
   if($('#pass').val()=='admin123') {
         $('.tab').show();
   }
   else{
        window.location.assign("index.php");
   }
});
$('.close').click(function(){
     window.location.assign("index.php");
});

    $('#sel1').change(function(){
        $('tr').remove(".appended");
        var val = $(this).val();
         $.post("php/acc.php",
    {
       id: '<?php echo $_SESSION["id"]; ?>',
       w:"get",
       val:val
      
        
    },
    function(data, status){
       var json = JSON.parse(data);
     console.log(json);
       $.each(json, function(idx, obj) {
           
       $('.tab').append('<tr class="appended"><td>'+obj.id+'</td><td>'+obj.name+'</td><td>'+obj.add+'</td>  <td>'+obj.mobile+'</td><td>'+obj.fish+'</td><td>'+obj.quantity+'</td> <td>'+obj.price+'</td>  <td><button class="btn '+obj.button+' update" id="'+obj.id+'">Update</button></td></tr>');


            });
      
    });



    });

$(document).ready(function(){
  $("#myModal").modal();

$(document).on('click', '.update', function(){ 
   var id= $(this).attr('id');
  
   
     $.post("php/acc.php",
    {
       id: id,
       w:"update",
       val:0
       
        
    },
    function(data, status){
        alert("Data: " + data );
        location.reload();
    });

});
}); 


</script>
</body>
</html>
