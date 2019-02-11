<?php
	$localhost="127.0.0.1";
	$user="root";
	$password="";
	$dbname="facemash";
	$conn=mysqli_connect($localhost,$user,$password,$dbname);
	while(true)
	{
		$query3="select * from images";
		$q3=mysqli_query($conn,$query3);
		//$query3="select Sno from images order by Sno desc limit 1";
		//$q3=mysqli_query($conn,$query3);
		//echo $q3;
		$count=mysqli_num_rows($q3);
		//echo $count;
		$c11=mt_rand(1,$count);
		$c22=mt_rand(1,$count);
		$c1=$c2=0;
		if($c11!=$c22)
		{
			$c1=$c11;
			$c2=$c22;
			$query1="select * from images where Sno='".$c1."'";
			$query2="select * from images where Sno='".$c2."'";
			$q1=mysqli_query($conn,$query1);
			$q2=mysqli_query($conn,$query2);
			break;
		}
	}
	$assoc1=mysqli_fetch_assoc($q1);
	$assoc2=mysqli_fetch_assoc($q2);
	$score1=$assoc1['score'];
	$score2=$assoc2['score'];
	$scr1=$assoc1['source'];
	$scr2=$assoc2['source'];
	$name1=$assoc1['name'];
	$name2=$assoc2['name'];
	echo "<script>
			document.onkeydown = function(evt) {
			evt = evt || window.event;
			if (evt.keyCode == 37) {
				document.getElementById('selection').innerHTML = '".$name1."';
				fnc1();
				location.reload();
			}
			else if (evt.keyCode == 39) {
				document.getElementById('selection').innerHTML ='".$name2."';
				fnc2();
				location.reload();
			}
			else{
				document.getElementById('selection').innerHTML='Use left and right arrow keys to vote';
			}
			};	
		</script>";
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<script>
		function fnc1(){
			<?php
				$score1=$score1+1;
				$update="update images set score='".$score1."' where Sno='".$c1."'";
				$quer1=mysqli_query($conn,$update);
			?>
		}
		function fnc2(){
			<?php
				$score2=$score2+1;
				$update="update images set score='".$score2."' where Sno='".$c2."'";
				$quer2=mysqli_query($conn,$update);
			?>
		}
	</script>
</head>
<body>
	<ul id="menu">
		<li><a href="../html/login.html"><u>Admin Login</u></a></li>
	</ul>
	<br /><br /><br />
	<center><div id="heading">
		<h2>Welcome To JUIT Facemash</h2>
	</div>
	<center><ul id="line">
		<li>
			<?php
			echo "<img src='../images/".$scr1.".jpg'>";
			?>
		</li>
		<li>
			<?php
			echo "<img src='../images/".$scr2.".jpg'>";
			?>
		</li>
	</ul>
	<center><ul id="line">
		<li>
			<?php
				echo $name1;
			?>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		</li>
		<li>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		<?php
				echo $name2;
			?>
		</li>
	</ul>
	<div>
		<p id="selection"></p>
	</div>
</body>