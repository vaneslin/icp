<?php
if (isset($_POST['submit']))
{
	require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$column=array("HipFlexionPreR","HipFlexionPreL","HipFlexionP1R","HipFlexionP1L","HipFlexionP2R","HipFlexionP2L"
,"HipExPreR","HipExPreL","HipExP1R","HipExP1L","HipExP2R","HipExP2L"
,"HipAbPreR","HipAbPreL","HipAbP1R","HipAbP1L","HipAbP2R","HipAbP2L"
,"HipDCR1preR","HipDCR1preL","HipDCR1P1R","HipDCR1P1L","HipDCR1P2R","HipDCR1P2L"
,"HipAEpreR","HipAEpreL","HipAEP1R","HipAEP1L","HipAEP2R","HipAEP2L"
,"HipDCR2preR","HipDCR2preL","HipDCR2P1R","HipDCR2P1L","HipDCR2P2R","HipDCR2P2L"
,"HipAinFpreR","HipAinFpreL","HipAinFP1R","HipAinFP1L","HipAinFP2R","HipAinFP2L"
,"HipDCR3preR","HipDCR3preL","HipDCR3P1R","HipDCR3P1L","HipDCR3P2R","HipDCR3P2L"
,"initials","date");


	$sql = "INSERT INTO rangeofmoventu (HipFlexionPreR,HipFlexionPreL,HipFlexionP1R,HipFlexionP1L,HipFlexionP2R,HipFlexionP2L
,HipExPreR,HipExPreL,HipExP1R,HipExP1L,HipExP2R,HipExP2L
,HipAbPreR,HipAbPreL,HipAbP1R,HipAbP1L,HipAbP2R,HipAbP2L
,HipDCR1preR,HipDCR1preL,HipDCR1P1R,HipDCR1P1L,HipDCR1P2R,HipDCR1P2L
,HipAEpreR,HipAEpreL,HipAEP1R,HipAEP1L,HipAEP2R,HipAEP2L
,HipDCR2preR,HipDCR2preL,HipDCR2P1R,HipDCR2P1L,HipDCR2P2R,HipDCR2P2L
,HipAinFpreR,HipAinFpreL,HipAinFP1R,HipAinFP1L,HipAinFP2R,HipAinFP2L
,HipDCR3preR,HipDCR3preL,HipDCR3P1R,HipDCR3P1L,HipDCR3P2R,HipDCR3P2L
,initials,date) VALUES ('".$_POST["HipFlexionPreR"]."','".$_POST["HipFlexionPreL"]."','".$_POST["HipFlexionP1R"]."','".$_POST["HipFlexionP1L"]."','".$_POST["HipFlexionP2R"]."','".$_POST["HipFlexionP2L"]."'
,'".$_POST["HipExPreR"]."','".$_POST["HipExPreL"]."','".$_POST["HipExP1R"]."','".$_POST["HipExP1L"]."','".$_POST["HipExP2R"]."','".$_POST["HipExP2L"]."'
,'".$_POST["HipAbPreR"]."','".$_POST["HipAbPreL"]."','".$_POST["HipAbP1R"]."','".$_POST["HipAbP1L"]."','".$_POST["HipAbP2R"]."','".$_POST["HipAbP2L"]."'
,'".$_POST["HipDCR1preR"]."','".$_POST["HipDCR1preL"]."','".$_POST["HipDCR1P1R"]."','".$_POST["HipDCR1P1L"]."','".$_POST["HipDCR1P2R"]."','".$_POST["HipDCR1P2L"]."'
,'".$_POST["HipAEpreR"]."','".$_POST["HipAEpreL"]."','".$_POST["HipAEP1R"]."','".$_POST["HipAEP1L"]."','".$_POST["HipAEP2R"]."','".$_POST["HipAEP2L"]."'
,'".$_POST["HipDCR2preR"]."','".$_POST["HipDCR2preL"]."','".$_POST["HipDCR2P1R"]."','".$_POST["HipDCR2P1L"]."','".$_POST["HipDCR2P2R"]."','".$_POST["HipDCR2P2L"]."'
,'".$_POST["HipAinFpreR"]."','".$_POST["HipAinFpreL"]."','".$_POST["HipAinFP1R"]."','".$_POST["HipAinFP1L"]."','".$_POST["HipAinFP2R"]."','".$_POST["HipAinFP2L"]."'
,'".$_POST["HipDCR3preR"]."','".$_POST["HipDCR3preL"]."','".$_POST["HipDCR3P1R"]."','".$_POST["HipDCR3P1L"]."','".$_POST["HipDCR3P2R"]."','".$_POST["HipDCR3P2L"]."'
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
$columnName.="date ='".$_POST[$column[49]]."'";

$id=$_GET['id'];
$sql = "UPDATE rangeofmovementu SET ".$columnName." WHERE patientID =".$id;
$conn->query($sql);
if ($conn->query($sql) === TRUE){
	//echo "successfully";
	header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/Treatmentplan.php?id=$id");


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

	$column=array("HipFlexionPreR","HipFlexionPreL","HipFlexionP1R","HipFlexionP1L","HipFlexionP2R","HipFlexionP2L"
,"HipExPreR","HipExPreL","HipExP1R","HipExP1L","HipExP2R","HipExP2L"
,"HipAbPreR","HipAbPreL","HipAbP1R","HipAbP1L","HipAbP2R","HipAbP2L"
,"HipDCR1preR","HipDCR1preL","HipDCR1P1R","HipDCR1P1L","HipDCR1P2R","HipDCR1P2L"
,"HipAEpreR","HipAEpreL","HipAEP1R","HipAEP1L","HipAEP2R","HipAEP2L"
,"HipDCR2preR","HipDCR2preL","HipDCR2P1R","HipDCR2P1L","HipDCR2P2R","HipDCR2P2L"
,"HipAinFpreR","HipAinFpreL","HipAinFP1R","HipAinFP1L","HipAinFP2R","HipAinFP2L"
,"HipDCR3preR","HipDCR3preL","HipDCR3P1R","HipDCR3P1L","HipDCR3P2R","HipDCR3P2L"
,"initials","date");


	$sql = "INSERT INTO rangeofmoventu (HipFlexionPreR,HipFlexionPreL,HipFlexionP1R,HipFlexionP1L,HipFlexionP2R,HipFlexionP2L
,HipExPreR,HipExPreL,HipExP1R,HipExP1L,HipExP2R,HipExP2L
,HipAbPreR,HipAbPreL,HipAbP1R,HipAbP1L,HipAbP2R,HipAbP2L
,HipDCR1preR,HipDCR1preL,HipDCR1P1R,HipDCR1P1L,HipDCR1P2R,HipDCR1P2L
,HipAEpreR,HipAEpreL,HipAEP1R,HipAEP1L,HipAEP2R,HipAEP2L
,HipDCR2preR,HipDCR2preL,HipDCR2P1R,HipDCR2P1L,HipDCR2P2R,HipDCR2P2L
,HipAinFpreR,HipAinFpreL,HipAinFP1R,HipAinFP1L,HipAinFP2R,HipAinFP2L
,HipDCR3preR,HipDCR3preL,HipDCR3P1R,HipDCR3P1L,HipDCR3P2R,HipDCR3P2L
,initials,date) VALUES('".$_POST["HipFlexionPreR"]."','".$_POST["HipFlexionPreL"]."','".$_POST["HipFlexionP1R"]."','".$_POST["HipFlexionP1L"]."','".$_POST["HipFlexionP2R"]."','".$_POST["HipFlexionP2L"]."'
,'".$_POST["HipExPreR"]."','".$_POST["HipExPreL"]."','".$_POST["HipExP1R"]."','".$_POST["HipExP1L"]."','".$_POST["HipExP2R"]."','".$_POST["HipExP2L"]."'
,'".$_POST["HipAbPreR"]."','".$_POST["HipAbPreL"]."','".$_POST["HipAbP1R"]."','".$_POST["HipAbP1L"]."','".$_POST["HipAbP2R"]."','".$_POST["HipAbP2L"]."'
,'".$_POST["HipDCR1preR"]."','".$_POST["HipDCR1preL"]."','".$_POST["HipDCR1P1R"]."','".$_POST["HipDCR1P1L"]."','".$_POST["HipDCR1P2R"]."','".$_POST["HipDCR1P2L"]."'
,'".$_POST["HipAEpreR"]."','".$_POST["HipAEpreL"]."','".$_POST["HipAEP1R"]."','".$_POST["HipAEP1L"]."','".$_POST["HipAEP2R"]."','".$_POST["HipAEP2L"]."'
,'".$_POST["HipDCR2preR"]."','".$_POST["HipDCR2preL"]."','".$_POST["HipDCR2P1R"]."','".$_POST["HipDCR2P1L"]."','".$_POST["HipDCR2P2R"]."','".$_POST["HipDCR2P2L"]."'
,'".$_POST["HipAinFpreR"]."','".$_POST["HipAinFpreL"]."','".$_POST["HipAinFP1R"]."','".$_POST["HipAinFP1L"]."','".$_POST["HipAinFP2R"]."','".$_POST["HipAinFP2L"]."'
,'".$_POST["HipDCR3preR"]."','".$_POST["HipDCR3preL"]."','".$_POST["HipDCR3P1R"]."','".$_POST["HipDCR3P1L"]."','".$_POST["HipDCR3P2R"]."','".$_POST["HipDCR3P2L"]."'
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
$columnName.="date ='".$_POST[$column[49]]."'";

$id=$_GET['id'];
$sql = "UPDATE rangeofmovementu SET ".$columnName." WHERE patientID =".$id;
$conn->query($sql);
if ($conn->query($sql) === TRUE){
	//echo "successfully";
	header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/rangeOfMovementL.php?id=$id");


} else {
	echo "Error:" .$sql. "<br>" .$conn->error;
}


}
?>
