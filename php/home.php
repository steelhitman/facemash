<!DOCTYPE html>	
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
	<?php
		session_start();
		$log=$_SESSION['logged'];
		$_SESSION['logged']=$log;
		if($log!=1)
		{	
			header('location:../html/login.html');
		}
	?>
	<ul>
		<li><a href="../php/logout.php"><u>Logout</u></a></li>
	</ul>
	<table>
		<tr>
			<form action="../php/reset.php" method="POST">
			<td>Reset Votes:</td>
			<td><input type="submit" text="Reset All"></input></td>
			</form>
		</tr>
		<tr>
			<form action="../php/view.php" method="POST">
			<td>View All Votes:</td>
			<td><input type="submit" text="View"></input></td>
			</form>
		</tr>
		<tr>
			<form action="../php/new.php" method="POST">
			<td>Add New Entry:</td>
			<td><input type="submit" text="New"></input></td>
			</form>
		</tr>
	</table>
</body>