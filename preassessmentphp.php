<?php
if (isset($_POST['submit']))
{
	require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$column=array("refName","refBase","refContact","phName"
,"phBase","phContact","OcName","OcBase","OcContact"
,"currentThPr","Diagnostic","yesorno","iniDate"
,"G","M","P","5m","10m","100m","initials");
//have deleted "yesorno","iniDate".




	$columnName="";
	$post="";
	for($i=0;$i<count($column)-1;$i++){

	$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";
 }
 $columnName.="initials='".$_POST[$column[19]]."'";

$id=$_GET['id'];
$initialsErr = "";


$sql = "UPDATE preassessment SET ".$columnName." WHERE patientID =".$id;
$conn->query($sql);


if ($conn->query($sql) === TRUE){
	//echo "successfully";
	header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/Preinjection.php?id=$id");
} else {
	echo "Error:" .$sql. "<br>" .$conn->error;
}




}

if (isset($_POST['save']))
{
	require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$column=array("refName","refBase","refContact","phName"
,"phBase","phContact","OcName","OcBase","OcContact"
,"currentThPr","Diagnostic","yesorno","iniDate"
,"G","M","P","5m","10m","100m"
,"initials");
//have deleted "yesorno","iniDate".




	$columnName="";
	$post="";
	for($i=0;$i<count($column)-1;$i++){

	$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";
 }
 $columnName.="initials='".$_POST[$column[19]]."'";

$id=$_GET['id'];
$sql = "UPDATE preassessment SET ".$columnName." WHERE patientID =".$id;
$conn->query($sql);
if ($conn->query($sql) === TRUE){
	//echo "successfully";
	header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/PreAssement.php?id=$id");
} else {
	echo "Error:" .$sql. "<br>" .$conn->error;
}
}
?>
