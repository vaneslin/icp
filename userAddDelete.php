<?php
require 'config.php';
$conn = New mysqli($host,$username,$password,$dbname) or die($conn->connect_error);

   if (isset($_POST['add'])) {
    	$sql = "INSERT INTO user (name, pw) VALUES ('".$_POST["name"]."', 
    	    '".$_POST["pw"]."')";
		if ($conn->query($sql) === TRUE) {
		    header("Location: showData.html");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


if(isset($_POST["deleteRecord"]))
{   
$id=$_GET['id'];
$sql="DELETE FROM user WHERE name= '".$id."'";
if ($conn->query($sql) === TRUE){
            header("Location: showData.html");
} else {
            echo $conn->error;
}
}
?>


<!doctype html>
<html lang="en">
<body>
    <form method="post">
		<label for="name">User Name</label>
		<input type="text" name="name" id="name"> <br>

		<label for="pw">Password</label>
		<input type="text" name="pw" id="pw"> <br>


		<input type="submit" name="add" value="Add">
	</form>
</body>
