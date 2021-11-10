<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/Login.css">
    <link rel="stylesheet" type="text/css" href="css/all-design.css">
    <title>Login</title>
	<?php
	require('connect.php');
	session_start();





	// If form submitted, insert values into the database.
	if (isset($_POST['submit'])){
	        // removes backslashes
		$username = stripslashes($_REQUEST['username']);
	        //escapes special characters in a string
		$username = mysqli_real_escape_string($conn,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
		//Checking is user existing in the database or not
	        $query = "SELECT * FROM `users` WHERE username='$username'
	and password='$password'";

		$result = mysqli_query($conn,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
	        if($rows==1){
		    $_SESSION['username'] = $username;
	            // Redirect user to index.php
		    header("Location: index.php");
	         }else{
	         	echo "<script type='text/javascript'>alert('Invalid Username or Password!');</script>";
		}
	    }else{
	         	
	    }
	?>



  </head>
  <body>
  	<section class="form my-4 mx-5">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-12 ">
  					<div>
						<h1 class="font-weight-bold col-lg-5 offset-1 login-form">Welcome!</h1>
						<h4 class="font-weight-bold col-lg-5 offset-1">Sign in to your account</h4>
	  					<form class="" method="post" action="Login.php">
	  						<div class="col-lg-4 offset-1 ">
	  							<input type="text" class="form-control" name="username" placeholder="Username" required>

	  						</div>
	  						<div class="col-lg-4 offset-1">
	  							<input type="password" class="form-control" name="password" placeholder="Password" required>
	  						</div>
	  						<div class="col-lg-4 offset-1">
	  							
	  							<button class="btn btn-primary" type="submit" name="submit">Login</button>
	  						</div>
	  						<div class="col-lg-4 offset-1">
	  							 <a href="#">Forgot Password?</a>
	  							<p>Don't have an account? <a href="Register.php">Register here.</a></p>
	  						</div>
						</div>
  					</form>

  				</div>
  			</div>
  		</div>
  	</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>