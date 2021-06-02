<?php 
include "connection.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['package_detail_id'])) {
	$package_detail_id = $_GET['package_detail_id'];

	// write delete query
	$sql = "DELETE FROM `package_detail_reference` WHERE `package_detail_id`='$package_detail_id'";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		//echo "Record deleted successfully.";
		header("Location: view_packages.php");
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>