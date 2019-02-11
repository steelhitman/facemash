<?php
	session_start();
	$log=$_SESSION['logged'];
	$_SESSION['logged']=$log;
	if($log!=1)
	{	
		header('location:../html/login.html');
	}
	$localhost="127.0.0.1";
	$user="root";
	$password="";
	$dbname="facemash";
	$conn=mysqli_connect($localhost,$user,$password,$dbname);
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$source=$_POST['source'];
		$query1="select * from images";
		$q1=mysqli_query($conn,$query1);
		$count=mysqli_num_rows($q1);
		$sno=$count+1;
		$score=0;
		$query2="insert into images values('$sno','$name','$source','$score')";
		$q2=mysqli_query($conn,$query2);
		if($q2)
		{
			echo "Successfully entered";
		}
		else
		{
			echo "Data Not entered";
		}
	}
?>
<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/new.css">
</head>
<body>
	<ul>
		<li><a href="../php/home.php"><u>Back To Home</u></a></li>
		<li><a href="../php/logout.php"><u>Logout</u></a></li>
	</ul>
	<div>
		<form action="new.php" method="POST">
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" cols="50"></input></td>
				</tr>
				<tr>
					<td>Image Source:</td>
					<td><textarea type="text" name="source" cols="100" rows="10"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" text="submit"></input></td>
				</tr>
			</table>
		</form>
	</div>
</body> 