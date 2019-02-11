<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/view.css">
</head>
<body>
	<ul>
		<li><a href="../php/home.php"><u>Back To Home</u></a></li>
		<li><a href="../php/logout.php"><u>Logout</u></a></li>
	</ul>
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
	mysqli_select_db($conn,$dbname);
	$query1="select * from images";
	$q1=mysqli_query($conn,$query1);
	$count=mysqli_num_rows($q1);
	$i=1;
	echo "<table>";
	while($i<=$count)
	{
		$query2="select * from images where Sno='".$i."'";
		$q2=mysqli_query($conn,$query2);
		$row=mysqli_fetch_assoc($q2);
		$name=$row['name'];
		$score=$row['score'];
		echo	"<tr>";
		echo 		"<td>".$i."</td>";
		echo        "<td>".$name."</td>";
		echo        "<td>".$score."</td>";
		echo     "</tr>";
		$i++;
	}
	echo "<table>";
?>
</body>