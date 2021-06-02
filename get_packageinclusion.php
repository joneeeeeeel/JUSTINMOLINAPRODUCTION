
<?php

include 'connection.php';
if(isset($_POST['service'])):
	//Get Country ID
$service=$_POST['service'];

//Query to get states based on country
$query=mysqli_query($conn,"select * from package_detail_reference where service_id=$service");
//Get states returned
$checkservices=mysqli_num_rows($query);
//If 1 or more states returned than loop and add options

if($checkservices>0):
	//echo "<option value=''>Select Inclusions</option>";
	while($row=mysqli_fetch_assoc($query)): 
		?>

		<option value="<?php echo $row['package_inclusion_description']; ?>">
					   <?php echo $row['package_inclusion_description']; ?>
		</option>

	<?php endwhile; 
else:
	//if no states found
	echo "<option value=''>No Inclusions Found</option>";
endif;
	endif;

?>
