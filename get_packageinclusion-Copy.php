<?php 

$connect = mysqli_connect("localhost", "root", "", "justinmolina_production");
if(isset($_POST['inclusion']))


{
 $inclusion = '';
 $package_name = $_POST['package_name'];
 $service = $_POST['service'];
 $tprice = $_POST['tprice'];



 foreach($_POST["inclusion"] as $row)
 {
  $inclusion .= $row . ', ';
 }
 $inclusion = substr($inclusion, 0, -2);

 $query = "INSERT INTO package_reference(package_name,package_description,total_price,service_id) VALUES('$package_name','".$inclusion."','$tprice','$service')";

 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>