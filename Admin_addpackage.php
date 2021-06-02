<?php 
include "connection.php";

    // if the form's submit button is clicked, we need to process the form
    if (isset($_POST['submit'])) {

        $svid = $_POST['svid'];
        $svname = $_POST['svname'];
        $inclusion = $_POST['inclusion'];
        $price = $_POST['price'];
        $status = $_POST['status'];

       
        $sql = "INSERT INTO `package_detail_reference`(`service_id`,`service_name`, `package_inclusion_description`, `package_detail_price`, `package_detail_status`) VALUES ('$svid','$svname','$inclusion','$price','$status')";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            //echo "New record created successfully.";
            header("Location: Admin_addpackage.php");
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

<form action="" method="POST">

<div class="container" style="width:250px; ">
<form action="" method="POST">

    <h2 align="center">Add Inclusions</h2><br />
        <select name="svid" id="svid" class="form-control action">

        <?php 
            $sqli = "SELECT *FROM services";
            $result = mysqli_query($conn, $sqli);
                while ($row  = mysqli_fetch_array($result)) {

                        echo '<option value="'.$row["service_id"].'">'.$row["service_name"].'</option>';
                    
                }
         ?>
    </select>


    <br>
    Inclusions:<br>
    <input type="text" name="inclusion" class="form-control action">
    <br>
    Price:<br>
    <input type="text" name="price" class="form-control action">
    <br>
    Status:<br>
    <input type="radio" name="status" value="Active">Active
    <input type="radio" name="status" value="Inactive">Inactive
    <br><br>

    <input type="submit" name="submit" value="Submit">
    <button type="button"><a href="view_packages.php" style="text-decoration: none;">View Packages</a></button>

</form>

</body>
</html>