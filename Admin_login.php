<?php

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


  <div class="container" style="width:500px; ">
<form class="form-horizontal" method="POST" action="Admin_logincode.php">
	<h1>Admin Login</h1>
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="login" class="btn btn-primary">Login</button>

    </div>
  </div>

</div>
</form>
</div>

</body>
</html>