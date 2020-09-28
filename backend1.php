<?php
include("connection.php");
$conn = db();
extract($_POST);


//To  fetch  all the data
if(isset($_POST['readrecord']))
{
	 $data = '<table class="table table-bordered table-striped">
          <tr>
            <th>UserId</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>IsAdmin</th>
            <th>Edit Action</th>
            <th>Delete Action</th>
          </tr>
        </thead>';
     $dquery = "SELECT * FROM user";
     $result = mysqli_query($conn,$dquery);
     

     if(mysqli_num_rows($result)>0)
     {
     	$number = 1;
     	while($row=mysqli_fetch_array($result)){

     		$data .= '<tr>
     		<td>'.$number.'</td>
     		<td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['password'].'</td>
            <td>'.$row['phone'].'</td>
            <td>'.$row['isAdmin'].'</td>
            <td>
            	<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
     		</td>
            <td>
            	<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
     		</td>
     	   </tr>';
     	  $number++;
     	}

     }
     $data.='</table>';
     echo $data;//to  pass $data into success 
}

//TO add a  user 
if(isset($_POST['uid']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['pass']) )
{
	$sql = "INSERT INTO user(id,`name`, `email`, `password`, `phone`, `isAdmin`) VALUES ('$id','$name','$email','$pass','$phone','0')";

	 mysqli_query($conn,$sql);
}



// delete user

if(isset($_POST['deleteid'])){
	$userid = $_POST['deleteid'];
	$deletequery =  "DELETE from user WHERE id='$deleteid'";
	mysqli_query($conn,$deletequery);
}


///get userid for update

if(isset($_POST['id']) && $_POST['id']!="")
{
    $user_id=$_POST['id'];

    $query= "SELECT * FROM user where id ='$user_id'";


    if(!$result=mysqli_query($conn,$query)){
        exit(mysqli_error());
    }

    $response = array();

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $response=$row;
        }
    }
    else
    {
        $response['status']=200;
        $response['message']="Data Not found!";
    }
//object converted into JSON using the PHP function json_encode();
    echo json_encode($response);

}
else
{
        $response['status']=200;
        $response['message']="Invalid Request!";
}

////update table

if(isset($_POST['hidden_uid'])){
    $id = $_POST['hidden_uid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $isadmin = $_POST['isadmin'];

    $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`password`='$pass',`phone`='$phone',`isAdmin`='$isadmin' WHERE `id`='$id'";
    mysqli_query($conn,$sql);
    
}
?>

