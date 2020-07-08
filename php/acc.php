<?php
$id= $_POST["id"];
	$w=$_POST["w"];
    $val=$_POST["val"];
    
if($w=='update'){
			$con=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");
	//mysql_select_db("church") or die("kkhdsfd");
$result1=mysqli_query($con,"UPDATE `order` SET `stat`= 1 WHERE`id`='".$id."' ")or die("unable to update");

	if($result1>0)
	{
		echo"WE HAVE SUCCESSFULLY ENTERED YOUR DATA";
		
	}
	else
	{
		echo "We are sorry, We are un available right now. Come back Later.";
	}
	
	}

else if($w=='get')
{
	if($val=='All')
	{
		$json =array();
		$con=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");
		$sql = "SELECT *,case stat WHEN 1 then 'btn-success' when 0 then'btn-default' else 'btn' end as 'button' FROM `order`a inner join `pet` b on a.pid = b.id where b.sid='".$id."' order by a.id desc";
		$result1=mysqli_query($con,$sql) or die("Unable to fetch");
		while($row=mysqli_fetch_array($result1) )
		{
           
		$json[]= array(
		'id'=>$row[0],
		'name'=> $row[1],
		'add'=>$row['add'], 
		'mobile'=>$row['mobile'],
        'date'=> $row['date'],
		'quantity'=>$row['quantity'], 
		'fish'=>$row[8],
        'price' =>$row['quantity'] * $row['price'],
        'button' =>$row['button']
        
		);
		}
		$jsonstring = json_encode($json);
 		echo $jsonstring;
	}
	else if($val=='Previous-Year')
	{
		$json =array();
		$con=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");
		$sql = "SELECT *,case stat WHEN 1 then 'btn-success' when 0 then' btn-default' else 'btn' end as 'button' FROM `order`a inner join `pet` b on a.pid = b.id where  `date` between '2016-01-01' and '2016-12-31' and b.sid='".$id."' ORDER by a.id desc";
		$result1=mysqli_query($con,$sql) or die("Unable to fetch");
		while($row=mysqli_fetch_array($result1) )
		{
			$json[] = array(
		'id'=>$row[0],
		'name'=> $row[1],
		'add'=>$row['add'], 
		'mobile'=>$row['mobile'],
        'date'=> $row['date'],
		'quantity'=>$row['quantity'], 
		'fish'=>$row[8],
        'price' =>$row['quantity'] * $row['price'],
          'button' =>$row['button']
         
		);
		}
		$jsonstring = json_encode($json);
 		echo $jsonstring;
	}
	else if($val=='Previous-Month')
	{
		$json =array();
		$con=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");
		$sql = "SELECT *,case stat WHEN 1 then 'btn-success' when 0 then' btn-default' else 'btn' end as 'button' FROM `order`a inner join `pet` b on a.pid = b.id where  `date` between '2017-01-01' and '2017-01-31' and b.sid='".$id."' ORDER by a.id desc";
		$result1=mysqli_query($con,$sql) or die("Unable to fetch");
		while($row=mysqli_fetch_array($result1) )
		{
			$json[] = array(
	'id'=>$row[0],
		'name'=> $row[1],
		'add'=>$row['add'], 
		'mobile'=>$row['mobile'],
        'date'=> $row['date'],
		'quantity'=>$row['quantity'], 
		'fish'=>$row[8],
        'price' =>$row['quantity'] * $row['price'],
          'button' =>$row['button']
         
		);
		}
		$jsonstring = json_encode($json);
 		echo $jsonstring;
	}
	else if($val=='Current-Month')
	{
		$json =array();
		$con=mysqli_connect("127.0.0.1","root","","pet")or die("unable to connect");
		$sql = "SELECT *,case stat WHEN 1 then 'btn-success' when 0 then' btn-default' else 'btn' end as 'button' FROM `order`a inner join `pet` b on a.pid = b.id where  `date` between '2017-02-01' and '2017-02-31' and b.sid='".$id."' ORDER by a.id desc";
		$result1=mysqli_query($con,$sql) or die("Unable to fetch");
		while($row=mysqli_fetch_array($result1) )
		{
			$json[] = array(
		'id'=>$row[0],
		'name'=> $row[1],
		'add'=>$row['add'], 
		'mobile'=>$row['mobile'],
        'date'=> $row['date'],
		'quantity'=>$row['quantity'], 
		'fish'=>$row[8],
        'price' =>$row['quantity'] * $row['price'],
          'button' =>$row['button']
		);
		}
		$jsonstring = json_encode($json);
 		echo $jsonstring;
	}
}	
?>