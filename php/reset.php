<?php
	session_start();
	$log=$_SESSION['logged'];
	$_SESSION['logged']=$log;
	if($log!=1)
	{	
		header('location:../html/login.html');
	}
	$conn=mysql_connect('localhost','root');
	mysql_select_db('facemash',$conn);
	echo "reseting data";
	$query1="select * from images";
	$q1=mysql_query($query1);
	$count=mysql_num_rows($q1);
	$i=1;
	while($i<=$count)
	{
		$query2="update images set score='0' where Sno='".$i."'";
		$q2=mysql_query($query2);
		$query3="select * from images";
		$q3=mysql_query($query3);
		$count=mysql_num_rows($q3);
		$i++;
	}
	header('location:../php/home.php');
	
?>