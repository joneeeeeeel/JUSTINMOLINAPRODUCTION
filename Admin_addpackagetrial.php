<?php 
include "connection.php";

// if the form's submit button is clicked, we need to process the form
  if (isset($_POST['submit'])) {
    // get variables from the form

        
        $package_name = $_POST['package_name'];
        $inclusion = $_POST['inclusion'];
        //$inclusion_sum = $_POST['inclusion_sum'];
        $service = $_POST['service'];
    //write sql query

    $sql = "INSERT INTO `package_reference`(`package_name`, `package_description`, `service_id`) VALUES ('$package_name','$inclusion','$service')";

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
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
      <h3 class="text-center">Create Package</h3>
   <!--<form method="post" class="mt-5" action="">-->
    <br>
    <form action="" method="POST">
      <div class="row">
        <div class="col-md-3 offset-md-4">
                  <select name="package_name" id="package_name" class="form-control action">
     <option value="Package A">Package A</option>
     <option value="Package B">Package B</option>
     <option value="Package C">Package C</option>
    </select>
    <br>
          <select required class="form-control" id="service" name="service">
            <option value="">Select Service</option>
            <?php
            include 'connection.php';
            $query=mysqli_query($conn,"select * from services");
            while($row=mysqli_fetch_assoc($query)):
            ?>
            <option value="<?php echo $row['service_id']; ?>"><?php echo $row['service_name']; ?></option>
          <?php endwhile; ?>
          </select>
          <br>
           <select required class="form-control" id="inclusion" name="inclusion" multiple="multiple">
            <option value="">Select Service first</option>
            
          </select>
          <br>
 <input type="submit" name="submit" value="Submit">
        </div>

        <div class="col-md-3" >

        </div>
      </div>

        
   </form>
 </div>

    <!-- Jquery Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
      $('#service').click(function(){
        //Get selected Country ID
        var service_id = $(this).val();
       $.ajax({
        type      : 'POST',
        url: 'get_packageinclusion.php',
        data      : 'service='+service_id, //pass country data
        success   : function(data)
        {
          $('#inclusion').html(data);
        }
        });
      })
    </script>
  </body>
</html>
