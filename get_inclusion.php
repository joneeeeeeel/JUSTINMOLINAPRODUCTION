
<?php

include 'connection.php';
if(isset($_POST['services'])):
	//Get Country ID
$services=$_POST['services'];

//Query to get states based on country
$query=mysqli_query($conn,"select * from package_reference where package_reference_id=$services");
//Get states returned
$checkservices=mysqli_num_rows($query);
//If 1 or more states returned than loop and add options

if($checkservices>0):
	//echo "<option value=''>Select Inclusions</option>";
	while($row=mysqli_fetch_assoc($query)): 
		?>

		<option value="<?php echo $row['package_description']; ?>">
					   <?php echo $row['package_description']; ?>
		</option>

	<?php endwhile; 
else:
	//if no states found
	echo "<option value=''>No Inclusions Found</option>";
endif;
	endif;

?>
