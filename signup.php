<?php include('signup_process.php');
include('faults.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp Form</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		
		<div class="text-uppercase text-center">
			<h2>SignUp</h2>
		</div>
		<form action="signup.php" method="post">
			<div>
				
				<label for="username">Name</label>
				<input type="text" name="username" class="form-control">

			</div>

			<div>
				
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control">

			</div>

			<div>
				
				<label for="phone">Phone</label>
				<input type="text" name="phone" class="form-control">

			</div>

			<div>
				
				<label for="password">Password</label>
				<input type="password" name="password_1" class="form-control">

			</div>

			<div>
				
				<label for="password">Confirm Password</label>
				<input type="password" name="password_2" class="form-control">
				
			</div>

	
			<div>
				<br>
				<button type="submit" name="reg_user" class="btn btn-primary" > Submit </button>
			</div>
			<p>Already a user ?<a href="login.php"><b>Login</b></a></p>
		</form>

		
	</div>

</body>
</html>