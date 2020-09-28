<?php 
include('process_login.php');
include('faults.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>

    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    
    <div class="text-primary text-uppercase text-center">
      <h2>Login</h2>
    </div>
    <form action="" method='post'>

      <div class="form-group">
        
        <label>Email</label>
        <input type="text" class="form-control" name="email" required>

      </div>

      <div class="form-group">
        
        <label  >Password</label>
        <input type="password" class="form-control" name="password" required>

      </div>

      
        <button type="submit" name="login" class="btn btn-primary"> Login </button>
      
      
    </form>

    
  </div>

</body>
</html>