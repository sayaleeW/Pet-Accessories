<?php

$name = $_POST["name"];
$mobile =$_POST["mobile"];
$address = $_POST["address"];
$date = $_POST["date"];
$pid = $_POST["pid"];
$qua = $_POST["qua"];
$date=date("Y-m-d",strtotime($date));

$con=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");
	//mysql_select_db("church") or die("kkhdsfd");
	
$result1=mysqli_query($con,"INSERT INTO `order`(`name`, `mobile`, `add`, `pid`,`date`,`quantity`) VALUES ('".$name."','".$mobile."','".$address."','".$pid."','".$date."','".$qua."')")or die("unable to insert");

	if($result1>0)
	{
		echo"WE HAVE SUCCESSFULLY ENTERED YOUR DATA";
		
	}
	else
	{
		echo "We are sorry, We are un available right now. Come back Later.";
	}
	
	


?>
