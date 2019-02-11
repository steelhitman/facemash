<?php	
	session_start();
	$conn=mysqli_connect('localhost','root','','facemash');
	if(isset($_POST['submit']))
	{
		$username=$_POST['usern'];
		$password=$_POST['pass'];
		$count=1;
		if($username=='admin' && $password=='admin')
			$count=2;
		//$query1="select * from admin where username='".$username."' and password='".$password."'";
		//$q1=mysqli_query($query1);
		//$count=mysqli_num_rows($q1);
		if($count>=1)
		{
			$_SESSION['logged']=1;
			header('location:../php/home.php');
		}
		else
		{
			header('location:../html/login.html');
		}
	}
?>