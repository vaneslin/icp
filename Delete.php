<?php
require 'config.php';
$conn = New mysqli($host,$username,$password,$dbname) or die($conn->connect_error);
$id=$_GET['id'];

$sql="DELETE FROM preinjection WHERE patientID= ".$id;
$conn->query($sql);

$sql="DELETE FROM preassessment WHERE patientID= ".$id;
$conn->query($sql);

$sql="DELETE FROM rangeofmovementl WHERE patientID= ".$id;
$conn->query($sql);

$sql="DELETE FROM rangeofmovementu WHERE patientID= ".$id;
$conn->query($sql);

$sql="DELETE FROM treatmentplan WHERE patientID= ".$id;
$conn->query($sql);

$sql="DELETE FROM demographics WHERE patientID= ".$id;

if ($conn->query($sql) === TRUE){
            header("Location: ICPBoard.php");
} else {
            echo $conn->error;
}
?>
