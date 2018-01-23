<?php
session_start();
$_SESSION["user"]=$_POST['name'];
if (isset($_POST['submit']))
{
	require "config.php";	
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql="SELECT * FROM user WHERE name='{$_POST['name']}' and pw='{$_POST['pw']}'";
	$result=$conn->query($sql);
	if (mysqli_num_rows($result)>=1){
		if ($_POST['name']=="Admin"){
		header("Location: ICPBoard.php?id=1");
		}else{
		header("Location: ICPBoard.php");
	}
	}else{
		header("Location: Cover.php?err=1");
		alert("invalid username or password");
	}


}

?>
