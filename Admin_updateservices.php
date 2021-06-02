<?php 
include "connection.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {

		$service_name = $_POST['service_name'];
		$service_id = $_POST['service_id'];
        $service_status = $_POST['service_status'];

		// write the update query
		$sql = "UPDATE `services` SET `service_name`='$service_name',`service_status`='$service_status' WHERE `service_id`='$service_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['service_id'])) {
	$service_id = $_GET['service_id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `services` WHERE `service_id`='$service_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$service_name = $row['service_name'];
			$service_status = $row['service_status'];
			$service_id = $row['service_id'];
		}

	?>
		<h2>Service Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Service Information:</legend>
 			Service:<br>
  			<input type="text" name="service_name" value="<?php echo $service_name; ?>">
  			<input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
    		<br>
		    Status:<br>
		    <input type="radio" name="service_status" value="Active" <?php if($service_status == 'Active'){ echo "checked";} ?> >Active
		    <input type="radio" name="service_status" value="Inactive" <?php if($service_status == 'Inactive'){ echo "checked";} ?>>Inactive
		    <br><br>
		    <input type="submit" value="Update" name="update">
		    <button type="button"><a href="view_services.php" style="text-decoration: none;">View Services</a></button>
		  </fieldset>
		</form>

		</body>
		</html>



	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: viewservices.php');
	}

}
?>