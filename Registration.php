<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Registration Form</title>
  <link rel="stylesheet" href="registration_style.css">
</head>
<body>
<div class="center">
<form action="registration_code.php" method="POST">
<h1>User Registration</h1>

       <div class="txt_field">
          <label class="control-label col-sm-2" for="email"></label>
          <div class="col-sm-6">
          <input type="text" name="firstname" class="input" id="firstname" required placeholder>
          <span></span>
          <label>First Name</label>
        </div>
        </div>  
        <div class="txt_field">
          <label class="control-label col-sm-2" for="email"></label>
          <div class="col-sm-6">
          <input type="text" name="lastname" class="input" id="lastname" required placeholder>
          <span></span>
          <label>Last Name</label>
        </div>  
        </div>  
<div class="wrapper">
    <div class="form">
        <div class="inputfield">
          <div class="custom_select">
            <select name="gender">
              <option name="gender" value="male">Male</option>
              <option name="gender" value="female">Female</option>
            </select>
          </div>
       </div> 
    </div>

  
        <div class="txt_field">
          <label class="control-label col-sm-2" for="email"></label>
          <div class="col-sm-6">
          <input type="email" name="email" class="input" id="email" required placeholder>
          <span></span>
          <label>Email Address</label>  
        </div> 
        </div>

       <div class="txt_field">
          <label class="control-label col-sm-2" for="email"></label>
          <div class="col-sm-6">
          <input type="password" name="password" class="input" id="pwd" required placeholder>
          <span></span>
          <label>Password</label>
        </div>  
        </div>
          <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" value="Register">
    </div>
  </div>
  <br>



 
</div>  
</form>
  
</body>
</html>