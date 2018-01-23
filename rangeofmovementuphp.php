<?php
if (isset($_POST['submit']))
{
	require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$column=array("shoulderFpreR","shoulderFpreL","shoulderFP1R","shoulderFP1L","shoulderFP2L","shoulderFP2L"
,"shoulderEpreR","shoulderEpreL","shoulderEP1R","shoulderEP1L","shoulderEP2L","shoulderEP2L"
,"shoulderAbpreR","shoulderAbpreL","shoulderAbP1R","shoulderAbP1L","shoulderAbP2L","shoulderAbP2L"
,"shoulderAdpreR","shoulderAdpreL","shoulderAdP1R","shoulderAdP1L","shoulderAdP2L","shoulderAdP2L"
,"shoulderIRpreR","shoulderIRpreL","shoulderIRp1R","shoulderIRp1L","shoulderIRp2L","shoulderIRp2L"
,"shoulderERpreR","shoulderERpreL","shoulderERp1R","shoulderERp1L","shoulderERp2L","shoulderERp2L"
,"initials","date");


	$sql = "INSERT INTO rangeofmovementl (shoulderFpreR,shoulderFpreL,shoulderFP1R,shoulderFP1L,shoulderFP2L,shoulderFP2L
,shoulderEpreR,shoulderEpreL,shoulderEP1R,shoulderEP1L,shoulderEP2L,shoulderEP2L
,shoulderAbpreR,shoulderAbpreL,shoulderAbP1R,shoulderAbP1L,shoulderAbP2R,shoulderAbP2L
,shoulderAdpreR,shoulderAdpreL,shoulderAdP1R,shoulderAdP1L,shoulderAdP2L,shoulderAdP2L
,shoulderIRpreR,shoulderIRpreL,shoulderIRp1R,shoulderIRp1L,shoulderIRp2L,shoulderIRp2L
,shoulderERpreR,shoulderERpreL,shoulderERp1R,shoulderERp1L,shoulderERp2L,shoulderERp2L
,initials,date) VALUES('".$_POST["shoulderFpreR"]."','".$_POST["shoulderFpreL"]."','".$_POST["shoulderFP1R"]."','".$_POST["shoulderFP1L"]."','".$_POST["shoulderFP2L"]."','".$_POST["shoulderFP2L"]."'
,'".$_POST["shoulderEpreR"]."','".$_POST["shoulderEpreL"]."','".$_POST["shoulderEP1R"]."','".$_POST["shoulderEP1L"]."','".$_POST["shoulderEP2L"]."','".$_POST["shoulderEP2L"]."'
,'".$_POST["shoulderAbpreR"]."','".$_POST["shoulderAbpreL"]."','".$_POST["shoulderAbP1R"]."','".$_POST["shoulderAbP1L"]."','".$_POST["shoulderAbP2R"]."','".$_POST["shoulderAbP2L"]."'
,'".$_POST["shoulderAdpreR"]."','".$_POST["shoulderAdpreL"]."','".$_POST["shoulderAdP1R"]."','".$_POST["shoulderAdP1L"]."','".$_POST["shoulderAdP2R"]."','".$_POST["shoulderAdP2L"]."'
,'".$_POST["shoulderIRpreR"]."','".$_POST["shoulderIRpreL"]."','".$_POST["shoulderIRp1R"]."','".$_POST["shoulderIRp1L"]."','".$_POST["shoulderIRp2R"]."','".$_POST["shoulderIRp2L"]."'
,'".$_POST["shoulderERpreR"]."','".$_POST["shoulderERpreL"]."','".$_POST["shoulderERp1R"]."','".$_POST["shoulderERp1L"]."','".$_POST["shoulderERp2R"]."','".$_POST["shoulderERp2L"]."'
,'".$_POST["initials"]."','".$_POST["date"]."')";


	$columnName="";
	$post="";
	for($i=0;$i<count($column)-1;$i++){
	 //if($_POST[$column[$i]]!==''){
	 //$sql= "UPDATE preassessment SET ".$column[$i]."='".$_POST[$column[$i]]."' WHERE patientID = 7";
	//	$conn->query($sql);
	$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";
 }
 //$columnName.="HipDCR3P2L='".$_POST[$column[count($column-1)]]."'";
$columnName.="date ='".$_POST[$column[37]]."'";

$id=$_GET['id'];
$sql = "UPDATE rangeofmovementl SET ".$columnName." WHERE patientID =".$id;


$conn->query($sql);
if ($conn->query($sql) === TRUE){
	//echo "successfully";
	header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/rangeOfMovementL.php?id=$id");

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

	$column=array("shoulderFpreR","shoulderFpreL","shoulderFP1R","shoulderFP1L","shoulderFP2L","shoulderFP2L"
,"shoulderEpreR","shoulderEpreL","shoulderEP1R","shoulderEP1L","shoulderEP2L","shoulderEP2L"
,"shoulderAbpreR","shoulderAbpreL","shoulderAbP1R","shoulderAbP1L","shoulderAbP2L","shoulderAbP2L"
,"shoulderAdpreR","shoulderAdpreL","shoulderAdP1R","shoulderAdP1L","shoulderAdP2L","shoulderAdP2L"
,"shoulderIRpreR","shoulderIRpreL","shoulderIRp1R","shoulderIRp1L","shoulderIRp2L","shoulderIRp2L"
,"shoulderERpreR","shoulderERpreL","shoulderERp1R","shoulderERp1L","shoulderERp2L","shoulderERp2L"
,"initials","date");


	$sql = "INSERT INTO rangeofmovementl (shoulderFpreR,shoulderFpreL,shoulderFP1R,shoulderFP1L,shoulderFP2L,shoulderFP2L
,shoulderEpreR,shoulderEpreL,shoulderEP1R,shoulderEP1L,shoulderEP2L,shoulderEP2L
,shoulderAbpreR,shoulderAbpreL,shoulderAbP1R,shoulderAbP1L,shoulderAbP2R,shoulderAbP2L
,shoulderAdpreR,shoulderAdpreL,shoulderAdP1R,shoulderAdP1L,shoulderAdP2L,shoulderAdP2L
,shoulderIRpreR,shoulderIRpreL,shoulderIRp1R,shoulderIRp1L,shoulderIRp2L,shoulderIRp2L
,shoulderERpreR,shoulderERpreL,shoulderERp1R,shoulderERp1L,shoulderERp2L,shoulderERp2L
,initials,date) VALUES('".$_POST["shoulderFpreR"]."','".$_POST["shoulderFpreL"]."','".$_POST["shoulderFP1R"]."','".$_POST["shoulderFP1L"]."','".$_POST["shoulderFP2L"]."','".$_POST["shoulderFP2L"]."'
,'".$_POST["shoulderEpreR"]."','".$_POST["shoulderEpreL"]."','".$_POST["shoulderEP1R"]."','".$_POST["shoulderEP1L"]."','".$_POST["shoulderEP2L"]."','".$_POST["shoulderEP2L"]."'
,'".$_POST["shoulderAbpreR"]."','".$_POST["shoulderAbpreL"]."','".$_POST["shoulderAbP1R"]."','".$_POST["shoulderAbP1L"]."','".$_POST["shoulderAbP2R"]."','".$_POST["shoulderAbP2L"]."'
,'".$_POST["shoulderAdpreR"]."','".$_POST["shoulderAdpreL"]."','".$_POST["shoulderAdP1R"]."','".$_POST["shoulderAdP1L"]."','".$_POST["shoulderAdP2R"]."','".$_POST["shoulderAdP2L"]."'
,'".$_POST["shoulderIRpreR"]."','".$_POST["shoulderIRpreL"]."','".$_POST["shoulderIRp1R"]."','".$_POST["shoulderIRp1L"]."','".$_POST["shoulderIRp2R"]."','".$_POST["shoulderIRp2L"]."'
,'".$_POST["shoulderERpreR"]."','".$_POST["shoulderERpreL"]."','".$_POST["shoulderERp1R"]."','".$_POST["shoulderERp1L"]."','".$_POST["shoulderERp2R"]."','".$_POST["shoulderERp2L"]."'
,'".$_POST["initials"]."','".$_POST["date"]."')";


	$columnName="";
	$post="";
	for($i=0;$i<count($column)-1;$i++){
	 //if($_POST[$column[$i]]!==''){
	 //$sql= "UPDATE preassessment SET ".$column[$i]."='".$_POST[$column[$i]]."' WHERE patientID = 7";
	//	$conn->query($sql);
	$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";
 }
 //$columnName.="HipDCR3P2L='".$_POST[$column[count($column-1)]]."'";
$columnName.="date ='".$_POST[$column[37]]."'";

$id=$_GET['id'];
$sql = "UPDATE rangeofmovementl SET ".$columnName." WHERE patientID =".$id;


$conn->query($sql);
if ($conn->query($sql) === TRUE){
	//echo "successfully";
	header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/rangeOfMovement(U).php?id=$id");

} else {
	echo "Error:" .$sql. "<br>" .$conn->error;
}

}
?>
