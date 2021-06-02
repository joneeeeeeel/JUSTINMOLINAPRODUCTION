<?php 
include "connection.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {

		$package_detail_id = $_POST['package_detail_id'];
		$package_inclusion_description = $_POST['package_inclusion_description'];
		$package_detail_price = $_POST['package_detail_price'];
        $package_detail_status = $_POST['package_detail_status'];

		// write the update query
		$sql = "UPDATE `package_detail_reference` 
		SET 
		`package_inclusion_description`='$package_inclusion_description',
		`package_detail_price`='$package_detail_price',
		`package_detail_status`='$package_detail_status' 
		WHERE
		`package_detail_id`='$package_detail_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['package_detail_id'])) {
	$package_detail_id = $_GET['package_detail_id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `package_detail_reference` WHERE `package_detail_id`='$package_detail_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
		$service_id = $row['service_id'];
		$service_name = $row['service_name'];
		$package_detail_id = $row['package_detail_id'];
		$package_inclusion_description = $row['package_inclusion_description'];
		$package_detail_price = $row['package_detail_price'];
        $package_detail_status = $row['package_detail_status'];
		}

	?>
		<h2>Package Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Package Information:</legend>
 			Service:<br>

				

 			<input type="text" name="service_id" value="<?php echo $service_id.$service_name?>"
 			style = " background-color: transparent;
			    border: 0px solid;
			    height: 20px;
			    width: 160px;
 			    color: #000000;
 			    font-weight: bold;
 			   " disabled >
 			<br>
 			
 			Inclusions:<br>
			<input type="text" name="package_inclusion_description" value="<?php echo $package_inclusion_description; ?>">
  			<input type="hidden" name="package_detail_id" value="<?php echo $package_detail_id; ?>">
    		<br>
    		Price:<br>
    		<input type="text" name="package_detail_price" value="<?php echo $package_detail_price; ?>">
    		<br>
		    Status:<br>
		    <input type="radio" name="package_detail_status" value="Active" <?php if($package_detail_status == 'Active'){ echo "checked";} ?> >Active
		    <input type="radio" name="package_detail_status" value="Inactive" <?php if($package_detail_status == 'Inactive'){ echo "checked";} ?>>Inactive
		    <br><br>
		    <input type="submit" value="Update" name="update">
		    <button type="button"><a href="view_packages.php" style="text-decoration: none;">View Packages</a></button>
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