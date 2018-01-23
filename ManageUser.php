<?php
	include 'config.php';

	$conn = New mysqli($host,$username,$password,$dbname) or die($conn->connect_error);

	$keyword = $_REQUEST['search']['value'];
	if( !empty($keyword) ){
		$sql = "SELECT * from user WHERE name LIKE '%".$keyword."%' ";
	}
	else {
		// getting records without any search*/
		$sql = "SELECT * from user";
	}
	
	$columns = array(
	// datatable column index  => database column name
		0 => 'user',
		1 => 'pw'
	);
	//$sql.=" ORDER BY ". $columns[$_REQUEST['order'][0]['column']]." ";

	$results = $conn->query($sql) or die("database access failed:" . $conn->error);
	$totalData = $results->num_rows;
	$totalFiltered = $results->num_rows;
	
	$allEmployee = array();
	while( $row = $results->fetch_array(MYSQLI_ASSOC) ) {
		$employee = array();
	  	$id = $row['name'];
		$employee[] = $row["name"];
		$employee[] = $row["pw"];
		$employee[] = "<form style=\"display: inline-block;\" action=\"editRecord.php?id=$id\" method=\"POST\"><input type=\"submit\" name=\"submitec\" value=\"Edit\" class=\"btn btn-default btn-sm inline\" style=\"width:70px; padding: 3px 9px !important;\"> </input></form>
			           <form style=\"display: inline-block;\" action=\"userAddDelete.php?id=$id\" method=\"POST\"><input type=\"submit\" name=\"deleteRecord\" value=\"Remove\" class=\"btn btn-default btn-sm inline\" style=\"width:70px; padding: 3px 9px !important;\"> </input></form>";

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