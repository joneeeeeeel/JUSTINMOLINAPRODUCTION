<?php 
include "connection.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['service_id'])) {
	$service_id = $_GET['service_id'];

	// write delete query
	$sql = "DELETE FROM `services` WHERE `service_id`='$service_id'";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		//echo "Record deleted successfully.";
		header("Location: view_services.php");
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>