<?php 
include "connection.php";


$sql = "SELECT * FROM package_detail_reference";


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
		<h2>Package Detail Reference</h2>
<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>Service Name</th>
		<th>Inckusion Description </th>
		<th>Price</th>
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
					<td><?php echo $row['package_detail_id']; ?></td>
					<td><?php echo $row['service_id']; ?></td>
					<td><?php echo $row['package_inclusion_description']; ?></td>
					<td><?php echo $row['package_detail_price']; ?></td>
					<td><?php echo $row['package_detail_status']; ?></td>

					<td><a class="btn btn-info" href="Admin_updatepackage.php?package_detail_id=<?php echo $row['package_detail_id']; ?>">Edit</a>
						&nbsp;
						<a class="btn btn-danger" href="Admin_deletepackage.php?package_detail_id=<?php echo $row['package_detail_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>