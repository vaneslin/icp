<?php

if (isset($_POST['submit2'] ))
{
require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$column=array( "name", "DOB", "gender", "dateICP", "height", "dateHeight", "weight", "dateWeight", "NHSNo", "TreatmentNo", "consultant", "Allergies");

$idErr = $nameErr = "";

//$IlovePHP = "I love php";


		if(empty($_POST["patientID"])){
			//echo "successfully";
			$idErr = "ID is essential part.";

		} else {
			$idErr = "";
		}

		if (empty($_POST["name"])){
			$nameErr = "Name is essential part.";
		}else{
			$nameErr = "";
		}

if (empty($_POST["patientID"]) || empty($_POST["name"])){
	header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/AddPatient.php?val=$idErr&val1=$nameErr");
} else {


	$ID="INSERT INTO Demographics (patientID,name,DOB,dateICP,gender
	, height, weight,dateHeight,dateWeight,NHSNo,TreatmentNo
	,consultant,Allergies) VALUES ('".$_POST["patientID"]."'
		,'".$_POST["name"]."','".$_POST["DOB"]."','".$_POST["dateICP"]."','".$_POST["gender"]."'
		,'".$_POST[" height"]."','".$_POST[" weight"]."','".$_POST["dateHeight"]."'
		,'".$_POST[" dateWeight"]."','".$_POST["NHSNo"]."','".$_POST["TreatmentNo"]."'
		,'".$_POST["consultant"]."','".$_POST["Allergies"]."')";



	$conn->query($ID);

	$ID="INSERT INTO preinjection (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);

	$ID="INSERT INTO preassessment (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);

	$ID="INSERT INTO treatmentplan (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);

	$ID="INSERT INTO rangeofmovementl (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);

	$ID="INSERT INTO rangeofmovementu (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);




     $columnName="";
     $post="";
	for($i=0;$i<count($column);$i++){
		$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";

}

$columnName.="Allergies='".$_POST[$column[11]]."'";
$id=$_GET['id'];

$sql= "UPDATE Demographics SET ".$columnName." WHERE patientID =".$id;
    $conn->query($sql);

/*echo '<script type = "text/javascript" language = "javascript">
window.open("http://www.bbc.co.uk");
</script>';*/

/*echo "<script type='text/javascript'> document.location = 'http://www.bbc.co.uk'; </script>"*/


ob_start();
$id = $_POST["patientID"];
//ob_start();
header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/PreAssement.php?id=$id");
exit();
}

//echo $idErr;
//header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/AddPatient.php?val=$idErr&val1=$nameErr");
//header("Location: http://localhost:8888/ICP3/Demographics.html");
}

if (isset($_POST['save'] ))
{
require "config.php";
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$column=array( "name", "DOB", "gender", "dateICP", "height", "dateHeight", "weight", "dateWeight", "NHSNo", "TreatmentNo", "consultant", "Allergies");

	$idErr = $nameErr = "";

	//$IlovePHP = "I love php";


			if(empty($_POST["patientID"])){
				//echo "successfully";
				$idErr = "ID is essential part.";

			} else {
				$idErr = "";
			}

			if (empty($_POST["name"])){
				$nameErr = "Name is essential part.";
			}else{
				$nameErr = "";
			}

if (empty($_POST["patientID"]) || empty($_POST["name"])){
	header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/AddPatient.php?val=$idErr&val1=$nameErr");
} else {

	$ID="INSERT INTO Demographics (patientID,name,DOB,dateICP,gender
	, height, weight,dateHeight,dateWeight,NHSNo,TreatmentNo
	,consultant,Allergies) VALUES ('".$_POST["patientID"]."'
		,'".$_POST["name"]."','".$_POST["DOB"]."','".$_POST["dateICP"]."','".$_POST["gender"]."'
		,'".$_POST[" height"]."','".$_POST[" weight"]."','".$_POST["dateHeight"]."'
		,'".$_POST[" dateWeight"]."','".$_POST["NHSNo"]."','".$_POST["TreatmentNo"]."'
		,'".$_POST["consultant"]."','".$_POST["Allergies"]."')";


	$conn->query($ID);

	$ID="INSERT INTO preinjection (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);

	$ID="INSERT INTO preassessment (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);

	$ID="INSERT INTO treatmentplan (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);

	$ID="INSERT INTO rangeofmovementl (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);

	$ID="INSERT INTO rangeofmovementu (patientID) VALUES ('".$_POST["patientID"]."')";
	$conn->query($ID);




     $columnName="";
     $post="";
	for($i=0;$i<count($column);$i++){
		$columnName.=$column[$i]."='".$_POST[$column[$i]]."',";

}

$columnName.="Allergies='".$_POST[$column[11]]."'";
$id=$_GET['id'];

$sql= "UPDATE Demographics SET ".$columnName." WHERE patientID =".$id;
    $conn->query($sql);

/*echo '<script type = "text/javascript" language = "javascript">
window.open("http://www.bbc.co.uk");
</script>';*/

/*echo "<script type='text/javascript'> document.location = 'http://www.bbc.co.uk'; </script>"*/



ob_start();
$id = $_POST["patientID"];
header("Location: http://gc02team12app.azurewebsites.net/ICP_Web/Demographics.php?id=$id");
exit();

}
//header("Location: http://localhost:8888/ICP3/Demographics.html");
}
?>
