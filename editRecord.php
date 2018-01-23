<?php
	include 'config.php';
?>

<?php
	$conn = New mysqli($host,$username,$password,$dbname) or die($conn->connect_error);
    $id = $_GET['id'];
    $pw = $conn->query("SELECT pw FROM user WHERE name=$id");

	if (isset($_POST['update'])) {
      
		$sql = "UPDATE user SET pw = '".$_POST["pw"]."' WHERE name ='".$id."'";
        if ($conn->query($sql) === TRUE)
        {
            header("Location: showData.html");
        } else {
            echo $conn->error;
        }
    }
    else {
        $sql = "SELECT * FROM user WHERE name = '".$id."'";
        $results =$conn->query($sql) or die ('request "Could not execute the SQL query" '.$sql);
        if ($results-> num_rows!=0)
        {
            $row = $results->fetch_assoc();
            $name = $row['name'];
            $pw = $row['pw'];
        }
    }
?>

<!doctype html>
<html lang="en">
<body>
    <form method="post">
		<label for="name">User Name</label>
		<input type="text" name="name" id="name" value="<?php echo $name ?>" disabled> <br>

		<label for="pw">Password</label>
		<input type="text" name="pw" id="pw" value="<?php echo $pw ?>"> <br>


		<input type="submit" name="update" value="Update">
	</form>
</body>
