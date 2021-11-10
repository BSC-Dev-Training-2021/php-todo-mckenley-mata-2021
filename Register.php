<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register
	</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="css/register.css">
	    <link rel="stylesheet" type="text/css" href="css/all-design.css">

<link rel="stylesheet" type="text/css" href="css/register.css">
    <title>Login</title>






	<?php 
	$var = 1;
	include 'connect.php' ;
	if (isset($_REQUEST['submit'])) {
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($conn,$username);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
		$trn_date = date("Y-m-d H:i:s");

		//view if the username is already exist
		$select = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
		if(mysqli_num_rows($select)) {
    		echo "<script type='text/javascript'>alert('Username Already exist!');</script>";
		}
		else
		{
			//insert the data to database
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '$password', '$email', '$trn_date')";
        $result = mysqli_query($conn,$query);
        if($result){
    		echo "<script type='text/javascript'>alert('User created!');</script>";
           mysqli_close($conn);
           $username="";
           $email="";
           $password="";
           $trn_date="";
        }
	}

}

	?>
</head>
<body>

  	<section class="form my-4 mx-5">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-12" >
  					<div class="sample">
						<h1 class="font-weight-bold col-lg-5 offset-1 login-form float-left">Welcome!</h1>
	  					<form class="" method="post" action="Register.php">
	  						
	  						<h4 class="font-weight-bold col-lg-5 offset-1 ">Register here.</h4>
	  						<div class="col-lg-4 offset-1 ">
	  							<input type="text" class="form-control" name="username" placeholder="Username" required>

	  						</div>
	  						<div class="col-lg-4 offset-1">
	  							<input type="email" class="form-control" name="email" placeholder="Email" required>
	  						</div>
	  						<div class="col-lg-4 offset-1">
	  							<input type="password" class="form-control" name="password" placeholder="Password" required>
	  						</div>



	  						<div class="col-lg-4 offset-1">
	  							<button class="btn btn-primary" type="submit" name="submit">Register</button>
	  						</div>
	  						<div class="col-lg-4 offset-1">
	  							 
	  							<p>Already have an account? <a href="Login.php">Login here.</a></p>
	  						</div>
						</div>
  					</form>

  				</div>
  			</div>
  		</div>
  	</section>
	


</body>
</html>