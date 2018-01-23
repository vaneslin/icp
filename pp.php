//<?php
if (isset($_POST['submit']))
{
	require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
    $column=array("yes_no"
		,"check1","check2"
		,"check3"
		,"DateA","DateI","assessment","attendingCli","localMembers","attendingFam","progress","health","Medication","hipX","orthotics","equipment","examination","domain1","goal1","performance1","satisfaction1","domain2","goal2","performance2","satisfaction2","domain3","goal3","performance3","satisfaction3","A","B","C","D","E","QFM","AHA","otherS","TUG","1MFWT","summary","initials","date");


$columnName="";
$post="";
for($i=0;$i<count($column)-1;$i++){
 	$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";
}
$columnName.="date ='".$_POST[$column[41]]."'";
$id=$_GET['id'];
$sql= "UPDATE preinjection SET ".$columnName." WHERE patientID =".$id;
$conn->query($sql);

header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/rangeOfMovement(U).php?id=$id");
}

if (isset($_POST['save']))
{
	require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
    $column=array("yes_no","check1","check2"
		,"check3"
		,"DateA","DateI","assessment","attendingCli","localMembers","attendingFam","progress","health","Medication","hipX","orthotics","equipment","examination","domain1","goal1","performance1","satisfaction1","domain2","goal2","performance2","satisfaction2","domain3","goal3","performance3","satisfaction3","A","B","C","D","E","QFM","AHA","otherS","TUG","1MFWT","summary","initials","date");


$columnName="";
$post="";
for($i=0;$i<count($column)-1;$i++){
 	$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";
}
$columnName.="date ='".$_POST[$column[41]]."'";
$id=$_GET['id'];
$sql= "UPDATE preinjection SET ".$columnName." WHERE patientID =".$id;
$conn->query($sql);

header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/preinjection.php?id=$id");
}




?>
