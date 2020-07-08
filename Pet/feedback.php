<html>
<head>
<title>AdminDashboard</title>
</head>
<body>

<h1> Welecome To Admin Dashboard</h1>
<br><br><Br>
<form action="feedback.php" method="post">
<table align="center" border="2">
<tr>
<th colspan="6" align="center"> Fedbacks</th>
</tr>
<tr>
<th> No.</th>
<th> First Name</th>
<th> Last NAme </th>
<th> agent name</th>
<th> subject</th>

</tr>
<tr>
<?php
		include('dbcon.php');
		
		
		$sql="SELECT * FROM `feedback`";
		$run=mysqli_query($con,$sql);
		if(mysqli_num_rows($run)<1)
		{
				echo "<tr> <td colspan='5'>No record found</td></tr>";
	}
	else
	{   $count=0;
		while($data=mysqli_fetch_assoc($run))
		{ $count++;
			?>
			<tr>
			<td><?php echo $count;?></td>
		<td><?php echo $data['firstname'];?></td>
				<td><?php echo $data['lastname'];?></td>
								<td><?php echo $data['agent'];?></td>
				<td><?php echo $data['subject'];?></td>
			
				</tr>
				
	<?php }}?>
</table>