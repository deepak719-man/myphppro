<?php 
$faults = array();
include('connection.php');
if(isset($_SESSION['email']))
{
  header('location:welcome.php');
  exit;
}


//register user
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $email="";
  $password="";

  $db = db();//getting the database object

  $email = mysqli_real_escape_string($db,$_POST['email']);//to escape the forward and backward empty spaces

  $password = mysqli_real_escape_string($db,$_POST['password']);


  $sql = "SELECT * from user where email='$email'";
  $result = mysqli_query($db,$sql);

//Check if result is empty i.e. no email  exists
  if(mysqli_num_rows($result)==0)
  {
    array_push($faults,"invalid email");
    
  }
  else
  {
    $row = mysqli_fetch_assoc($result);
    if($row['password']!=$password)
    {
      array_push($faults,"invalid password");
      
    }
    else
    {
      //starting session to  use in welcome.php
      session_start();
      $_SESSION['username']=$row['name'];
      $_SESSION['email']=$row['email'];
      $_SESSION['loggedin']=true;
      if($row['isAdmin']==0)
      {
        header("location:welcome.php");
      }
      else
      {
        header("location:index.php");
      }
      
      
    }
  }
  
mysqli_close($db);  
}

?>