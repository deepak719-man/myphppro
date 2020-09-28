<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

	<div class="container">
		<h1 class="text-primary text-uppercase text-center">Admin</h1>
		<!-- Button to Open the Modal -->
		<div class="d-flex justify-content-end">
			
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Users</button>
		</div>
<br><br>
		<div id="records_contant">
			
		</div>

			<!-- The Modal -->
			<div class="modal" id="myModal">
  				<div class="modal-dialog">
    				<div class="modal-content">

      <!-- Modal Header -->
      				<div class="modal-header">
        				<h4 class="modal-title">Add User</h4>
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
      				</div>

      <!-- Modal body -->
      				<div class="modal-body">


      	  				<div class="form-group">
      	  					<label>Name</label>
      	  					<input type="text" name="" id="name" class="form-control" placeholder="Name">
      	  					
      	  				</div>

      	  				<div class="form-group">
      	  					<label>Email</label>
      	  					<input type="email" name="" id="email" class="form-control" placeholder="Email Id">
      	  					
      	  				</div>

      	  				<div class="form-group">
      	  					<label>Phone Number</label>
      	  					<input type="number" name="" id="phone" class="form-control" placeholder="Phone">
      	  					
      	  				</div>

      	  				<div class="form-group">
      	  					<label>Password</label>
      	  					<input type="password" name="" id="pass" class="form-control" placeholder="Password">
      	  					
      	  				</div>
      				</div>

      <!-- Modal footer -->
      				<div class="modal-footer">
      					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addRecord()">Save</button>
       		 			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      				</div>

    			</div>
  			</div>
		</div>

<div class="d-flex justify-content-center">
			
			<a type="button" class="btn btn-primary" href="login.php" >Logout</a>
		</div>


<!-- Update Modal -->
			<div class="modal" id="upmodal">
  				<div class="modal-dialog">
    				<div class="modal-content">

      <!-- Modal Header -->
      				<div class="modal-header">
        				<h4 class="modal-title">Edit User</h4>
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
      				</div>

      <!-- Modal body -->
      				<div class="modal-body">


      	  				<div class="form-group">
      	  					<label>Name</label>
      	  					<input type="text" name="" id="up_name" class="form-control" placeholder="Name">
      	  					
      	  				</div>

      	  				<div class="form-group">
      	  					<label>Email</label>
      	  					<input type="email" name="" id="up_email" class="form-control" placeholder="Email Id">
      	  					
      	  				</div>

      	  				<div class="form-group">
      	  					<label>Phone Number</label>
      	  					<input type="number" name="" id="up_phone" class="form-control" placeholder="Phone">
      	  					
      	  				</div>

      	  				<div class="form-group">
      	  					<label for="admin">IsAdmin</label>
							<input type="number" id="admin" name="admin" class="form-control" >
      	  					
      	  				</div>



      	  				<div class="form-group">
      	  					<label>Password</label>
      	  					<input type="password" name="" id="up_pass" class="form-control" placeholder="Password">
      	  					
      	  				</div>
      				</div>

      <!-- Modal footer -->
      				<div class="modal-footer">
      					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="UpdateRecord()">Update</button>
       		 			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

       		 			<input type="hidden" name="" id="hidden_uid">
      				</div>

    			</div>
  			</div>
		</div>

	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script >

$(document).ready(function(){

	readRecords();
});
	function readRecords(){
		//to fetch the records we set a variable readrecord 
		var readrecord = true;

		$.ajax({
			url:"backend1.php",
			type:"post",
			data:{
				readrecord:readrecord//we pass the readrecord variable to check the request type
			},
			success:function(data,success){
				// the ajax request finishes we get the data which contains all the records that  we pass to a div(records_contant) using .html
				$('#records_contant').html(data);
			}

		});
	}



	function addRecord(){
		//firstly
		var uid =true;
		var name=$('#name').val();
		var email=$('#email').val();
		var phone = $('#phone').val();
		var pass = $('#pass').val();

		$.ajax({
			url:"backend1.php",
			type:'post',
			data: {
				uid:uid,
				name : name,
				email :email,
				phone : phone,
				pass : pass
			},
			success:function(data,status){
				
				readRecords(); 
			}

		});

	}

	function DeleteUser(deleteid){
		//deleteid is passed when delete button is pressed
		var conf = confirm("Are you sure??");//tp pop up the confirmation box
		if(conf==true)
		{
			$.ajax({
				url:"backend1.php",
				type:"post",
				data:{deleteid:deleteid},
				success:function(data,status)
				{
					//calling readRecords() to display again after deletion
					readRecords();
				}
			});
		}
	}

	function GetUserDetails(id){
		//ID pased when edit button is pressed
		$('#hidden_uid').val(id);

		$.post("backend1.php",{
				id:id
		},function(data,status){
			//we get the data and then parse into JSON for "user" variable 
			var user = JSON.parse(data);
			//setting the values of modal parameters
			$('#up_name').val(user.name);
			$('#up_pass').val(user.password);
			$('#up_email').val(user.email);
			$('#up_phone').val(user.phone);
			$('#admin').val(user.isAdmin);
		}

		);

		$('#upmodal').modal("show");//to pop up the modal 
	}

	function UpdateRecord(){
		//getting all the data from the modal
		var name = $('#up_name').val();
		var email = $('#up_email').val();
		var phone = $('#up_phone').val();
		var pass = $('#up_pass').val();	
		var hidden_uid = $("#hidden_uid").val();
		var isadmin = $("#admin").val();

		$.post("backend1.php",{
			hidden_uid:hidden_uid,
			name:name,
			email:email,
			phone:phone,
			pass:pass,
			isadmin:isadmin
		  },
		  function(data,status){
		     $('#upmodal').modal("hide");//to hide the modal 	
		     readRecords();//display  again the  data	  	
		  }

			)			
	}
</script>


</body>
</html>