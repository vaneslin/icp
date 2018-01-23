<?php
	include 'config.php';

	$conn = New mysqli($host,$username,$password,$dbname) or die($conn->connect_error);

	$keyword = $_REQUEST['search']['value'];
	if( !empty($keyword) ){
		$sql = "SELECT * from demographics WHERE patientID LIKE '%".$keyword."%' ";
		$sql .= " OR name LIKE '%".$keyword."%' ";
	}
	else {
		// getting records without any search*/
		$sql = "SELECT * from demographics";
	}
	
	$columns = array(
	// datatable column index  => database column name
		0 => 'patientID',
		1 => 'name',
		2 => 'DOB',
		3 => 'gender',
		4 => 'dateICP',
		5 => 'Allergies'
	);
	//$sql.=" ORDER BY ". $columns[$_REQUEST['order'][0]['column']]."   ".$_REQUEST['order'][0]['dir']."  LIMIT ".$_REQUEST['start']." ,".$_REQUEST['length']." ";

	$results = $conn->query($sql) or die("database access failed:" . $conn->error);
	$totalData = $results->num_rows;
	$totalFiltered = $results->num_rows;
	
	$allEmployee = array();
	while( $row = $results->fetch_array(MYSQLI_ASSOC) ) {
		$employee = array();
	  	$id = $row['patientID'];
		$employee[] = $row["patientID"];
		$employee[] = $row["name"];
		$employee[] = $row["DOB"];
		$employee[] = $row["gender"];
		$employee[] = $row["dateICP"];
		$employee[] = $row["Allergies"];
		$employee[] = "<a href=\"Demographics.php?id=$id\"><i class=\"fa fa-pencil fa-lg\"></i></a>
			           <a href=\"Delete.php?id=$id\"><i class=\"fa fa-close fa-lg\"></i></a>";

		$allEmployee[] = $employee;
	}

	$json_data = array(
			"draw"            => intval( $_REQUEST['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching
			"data"            => $allEmployee   // total data array
			);
	echo json_encode($json_data);  // send data as json format
?>

