<?php 
include "connection.php";

    // if the form's submit button is clicked, we need to process the form
    if (isset($_POST['submit'])) {

        $svname = $_POST['svname'];
        $inclusion = $_POST['inclusion'];
        $price = $_POST['price'];
        $status = $_POST['status'];

        $sql = "INSERT INTO `package_detail_reference`(`service_name`, `package_inclusion_description`, `package_detail_price`, `package_detail_status`) VALUES ('$svname','$inclusion','$price','$status')";

        

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <?php  

                if(isset($_SESSION['status']))
                {
                    echo "<h4>".$_SESSION['status']."</h4>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Select Service </h4>
                        <select name="svname">
                    <?php 
            $sqli = "SELECT *FROM services";
            $result = mysqli_query($conn, $sqli);
                while ($row = mysqli_fetch_array($result)) {

                    echo '<option>'.$row['service_name'];
                }
         ?>
                </select>
                    </div>
                    <div class="card-body">
                    	    <legend>Select Inclusion:</legend>
    	
    <br>


                        <form action="code.php" method="POST">

                        <?php
                            $conn = mysqli_connect("localhost","root","","justinmolina_production");
        
                            $pkg_query = "SELECT * FROM package_detail_reference";
                            $query_run = mysqli_query($conn, $pkg_query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $pck_inclusion)
                                {
                                    ?>
                                    <input type="checkbox" name="package_inclusion_list[]" value="<?= $pck_inclusion['package_inclusion_description']; ?>" /> <?= $pck_inclusion['package_inclusion_description']; ?> <br/>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Record Found";
                            }
                        ?>
                            <div class="form-group mt-3">
                                <button name="save_multicheckbox" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>