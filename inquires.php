<?php 

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
      <h3 class="text-center">Inquire</h3>
   <!--<form method="post" class="mt-5" action="">-->
    <br>      
    <form action="" method="POST">
      <div class="row">
        <div class="col-md-3 offset-md-4">

    <br>
          <select required class="form-control" id="service" name="service">
            <option value="">Select Service</option>
            <?php
            include 'connection.php';
            $query=mysqli_query($conn,"select * from services");
            while($row=mysqli_fetch_assoc($query)):
            ?>
            <option value="<?php echo $row['service_id']; ?>"><?php echo $row['service_name']; ?></option>
          <?php 
        endwhile; 
        ?>  
          </select>
          <br>
           <select required class="form-control" id="packages" name="packages">
            <option value="">Select Service first</option>
                        <?php
            include 'connection.php';
            $query=mysqli_query($conn,"select * from package_reference");
            while($row=mysqli_fetch_assoc($query)):
            ?>
            <option value="<?php echo $row['package_reference_id']; ?>"><?php echo $row['package_name']; ?></option>
          <?php 
        endwhile; 
        ?> 

          </select>
          <br>
                <h5>Inclusions:</h5>
                
             <select required class="form-control" id="inclusion" name="inclusion" multiple="inclusion" >
            <option value="">Select Service first</option>
                        <?php
            include 'connection.php';
            $query=mysqli_query($conn,"select * from package_reference");
            while($row=mysqli_fetch_assoc($query)):
            ?>
            <option value="<?php echo $row['package_reference_id']; ?>"><?php echo $row['package_description']; ?></option>
          <?php 
        endwhile; 
        ?> 
          </select>
<br>
    

 <input type="submit" name="submit" value="Submit">
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
        url: 'get_inquire.php',
        data      : 'service='+service_id, //pass country data
        success   : function(data)
        {
          $('#packages').html(data);
        }
        });
      })
    </script>

    

  </body>
</html>
