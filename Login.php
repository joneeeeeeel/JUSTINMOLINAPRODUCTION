<?php

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="login_style.css">
</head>
<body>
  <div class="center">
<form class="form-horizontal" method="POST" action="login_code.php">
  <h1>Sign in</h1>
  
  <div class="txt_field">
    <label class="control-label col-sm-2" for="email"></label>
    <div class="col-sm-6">
      <input type="email" class="form-control" name="email" id="email" required placeholder>
      <span></span>
      <label>Email</label>
    </div>
  </div>
  <div class="txt_field">
    <label class="control-label col-sm-2" for="pwd"></label>
    <div class="col-sm-6"> 
      <input type="password" class="form-control" name="password" id="pwd" required placeholder>
      <span></span>
      <label>Password</label>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" value="Continue">
   
    </div>
  </div>
          <div class="signup_link">
          Not a member? <a href="Registration.php">Signup</a>
        </div>
</form>
</div>
</div>

</body>
</html>
