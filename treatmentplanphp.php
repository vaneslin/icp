<?php
if (isset($_POST['submit']) || isset($_POST['save']))
{
	require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}



//    $column=array("q1","q2","ifyes","q3","q4","q5","q6"
//		,"targetmuscles","treatmentgoals",,"COPM1","COPM2","COPM3"
//	,"ThInF","PhAc","q7","details1","q8","details2","q9","details3");

$column=array("q1","q2","q3","q4","q5","q6","q7","q8","q9","ifyes","targetmuscles"
,"treatmentgoals","COPM1","COPM2","COPM3","dropdown1","dropdown2"
,"ThInF","PhAc"
,"addChild","specialPre"
,"details1","details2","details3");

$columnName="";
$post="";
for($i=0;$i<count($column)-1;$i++){
 	$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";
}
//$columnName.="details3='".$_POST[$column[20]]."'";
$columnName.="details3='".$_POST[$column[23]]."'";
//details can't be stored into database
$id=$_GET['id'];
$sql= "UPDATE treatmentplan SET ".$columnName." WHERE patientID =".$id;
$conn->query($sql);
//echo "successfullly";

header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/ICPBoard.php");
}




?>
