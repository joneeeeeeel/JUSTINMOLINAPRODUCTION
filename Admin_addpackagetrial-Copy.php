
<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Bootstrap Multi Select Dropdown with Checkboxes using Jquery in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
<h3 class="text-center">Create Package</h3>
   <br /><br />

   <form method="post" id="inclusion_form">

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
   

    <div class="form-group">
   
     <select id="inclusion" name="inclusion[]" multiple class="form-control" >
            
            <?php
            include 'connection.php';
            $query=mysqli_query($conn,"select * from package_detail_reference");
            while($row=mysqli_fetch_assoc($query)):
            ?>
            <option value="<?php echo $row['package_inclusion_description']; ?>"><?php echo $row['package_inclusion_description']; ?></option>
          <?php endwhile; ?>

          </select>
       

     </select>

    </div>
    <div class="form-group">



     <input type="submit" class="btn btn-info" name="submit" value="Submit"/>
    </div>
   </form>

<input type="submit" class ="btn btn-info " name="submit" value="Total Price">





</input>


   <br />
  </div>
 </body>
</html>



   <script>    

   
$(document).ready(function(){
 $('#inclusion').multiselect({
  nonSelectedText: 'Select Inclusions',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });


 $('#inclusion_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"get_packageinclusion-Copy.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#inclusion option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#inclusion').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>





