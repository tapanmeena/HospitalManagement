<?php
$check = $_POST['check'];
$val = $_POST['val'];
$table = $_POST['table'];
include "config.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	$val1=(string)$val;
	if($table == "patient"){
		$sql1 = "delete from appointment where pid=$val1";
		mysqli_query($conn,$sql1);
		$sql="delete from patient where pid=$val1";
		$result = mysqli_query($conn,$sql);
		$sql1 = "delete from login where userid=$val1";
		mysqli_query($conn,$sql1);
		header("Refresh:0; url=userlist.php?usertype=patient");
		 mysqli_close($conn);
	}
	if ($check == "delete"){
		if($table == "doctor"){
			$sql="delete from doctor where did=$val1";
			$res=mysqli_query($conn,$sql);
			$sql1="delete from login where userid=$val1";
			$result=mysqli_query($conn,$sql1);
		 	header("Refresh:0; url=userlist.php?usertype=doctor");
		 }
	}
	if ($check == "delete"){
		if($table == "nurse"){
			$sql="delete from nurse where nid=$val1";
			mysqli_query($conn,$sql);
			$sql1="delete from login where userid=$val1";
			$result=mysqli_query($conn,$sql1);
		 	header("Refresh:0; url=userlist.php?usertype=nurse");
		 }
	}
	if ($check == "delete"){
		if($table == "receptionist"){
			$sql="delete from receptionist where rid=$val1";
			mysqli_query($conn,$sql);
			$sql1="delete from login where userid=$val1";
			$result=mysqli_query($conn,$sql1);
		 	header("Refresh:0; url=userlist.php?usertype=receptionist");
		 }
	}
}
?>