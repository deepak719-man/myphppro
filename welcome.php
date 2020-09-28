<?php 
session_start();
//starting session to get the username below
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
		<div class="d-flex justify-content-center">
	    <h3>Welcome <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){}else{echo $_SESSION['username'];}?></h3>
	    </div><br><br>
		<div class="d-flex justify-content-center">
			
			<a type="button" class="btn btn-primary" href="login.php" >Logout</a>
		</div>
</body>
</html>
