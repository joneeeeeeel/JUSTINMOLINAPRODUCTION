<?php
//index.php

include('connection.php');

$service_name = '';

$query = "SELECT service_id,service_name FROM services GROUP BY service_name ORDER BY service_name ASC";


$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $service_name .= '<option value="'.$row["service_id"].'">'.$row["service_name"].'</option>';
}



?>
<!DOCTYPE html>
<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="jquery.lwMultiSelect.js"></script>
  <link rel="stylesheet" href="jquery.lwMultiSelect.css" />
 </head>
 <body>
  <br /><br />

  <div class="container" style="width:600px;">
   <h2 align="center">Create Package</h2><br /><br />
   <form method="post" id="insert_data">
        <select name="package_name" id="package_name" class="form-control action">
     <option value="">Package A</option>
     <option value="">Package B</option>
     <option value="">Package C</option>
    </select>
<br>
    <select name="service_name" id="service_name" class="form-control action">
     <option value="">Select Service</option>
     <?php echo $service_name; ?>
    </select>
    <br />
    <select name="package_inclusion_description" id="package_inclusion_description" multiple class="form-control">
   <?php 

 $package_inclusion_description = '';

$query = "SELECT package_inclusion_description FROM package_detail_reference GROUP BY package_inclusion_description ORDER BY package_inclusion_description ASC";

//$query = "SELECT * from package_inclusion_description where service_id='.$service_id.')";


$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $package_inclusion_description .= '<option value="'.$row["package_inclusion_description"].'">'.$row["package_inclusion_description"].'</option>';
}

   echo $package_inclusion_description; 

?>


    </select>
    <br />
    <input type="submit" name="insert" id="action" class="btn btn-info" value="Insert" />
   </form>
  </div>
 </body>
</html>

