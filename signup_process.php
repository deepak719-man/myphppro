<?php

//initialize
$username="";
$email="";
$password_1="";
$password_2="";

$faults=array();


include('connection.php');
$db = db();

if($db===false)
{
	die("Connection failed: " . mysqli_connect_error());
}
//register user
if($_SERVER['REQUEST_METHOD']== "POST")
{

	$username = mysqli_real_escape_string($db,$_POST['username']);

	$email = mysqli_real_escape_string($db,$_POST['email']);

	$password1 = mysqli_real_escape_string($db,$_POST['password_1']);

	$password2 = mysqli_real_escape_string($db,$_POST['password_2']);

	$phone = mysqli_real_escape_string($db,$_POST['phone']);

//check if password are same 
if(!empty($password1) && ($password1 == $password2)) {
//check for password attributes
	if (strlen($password1) <= '8') {
        array_push($faults,"Your Password Must Contain At Least 8 Characters!");
        }
    elseif(!preg_match("#[0-9]+#",$password1)) {
    	array_push($faults,"Your Password Must Contain At Least 1 Number!");
    	}
    elseif(!preg_match("#[A-Z]+#",$password1)) {
         array_push($faults,"Your Password Must Contain At Least 1 Capital Letter!");
        }
    elseif(!preg_match("#[a-z]+#",$password1)) {
        array_push($faults,"Your Password Must Contain At Least 1 Lowercase Letter!");
       }
    else{

//validate email 
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             array_push($faults, "Invalid email format");
         }
    else{

			$sql = "SELECT * from user where email='$email'";
			$result = mysqli_query($db,$sql);
			//check if an email exists in the database

			if(mysqli_num_rows($result)>0)
			{
				array_push($faults,"Email already exists!!");
			}
			else
			{

				$sql = "INSERT INTO user(id,`name`, `email`, `password`, `phone`, `isAdmin`) VALUES ('$id','$username','$email','$password1','$phone','0')";

				if(mysqli_query($db, $sql))
				{
					header("location:login.php");
				} 
				else
				{
  					array_push($faults,"Error: $sql".mysqli_error($db));
				}
			}
		}
	}
	
}
else
{
	array_push($faults,"Recheck the password");
}
mysqli_close($db);

}


?>
 