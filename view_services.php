<?php 
include "connection.php";


$sql = "SELECT * FROM services";


$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Services</h2>
<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>Services</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['service_id']; ?></td>
					<td><?php echo $row['service_name']; ?></td>
					<td><?php echo $row['service_status']; ?></td>
					<td><a class="btn btn-info" href="Admin_updateservices.php?service_id=<?php echo $row['service_id']; ?>">Edit</a>
						&nbsp;
						<a class="btn btn-danger" href="Admin_deleteservices.php?service_id=<?php echo $row['service_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>