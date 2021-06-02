<?php 
include "connection.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form

        $svname = $_POST['svname'];
        $status = $_POST['status'];
		//write sql query

		$sql = "INSERT INTO `services`(`service_name`, `service_status`) VALUES ('$svname','$status')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>

<!DOCTYPE html>
<html>
<body>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="jquery.lwMultiSelect.js"></script>
  <link rel="stylesheet" href="jquery.lwMultiSelect.css" />
 </head>
  <br /><br />
<div class="container" style="width:250px; ">
<form action="" method="POST">

    <h2 align="center">Add Service</h2><br />
    Service:<br>
    <input type="text" name="svname">
    <br>
    Status:<br>

    <input type="radio" name="status" value="Active">Active
    <input type="radio" name="status" value="Inactive">Inactive
    <br><br>
    <input type="submit" name="submit" value="Submit">
    <button type="button"><a href="view_services.php" style="text-decoration: none;">View Services</a></button>

</form>

</body>
</html>