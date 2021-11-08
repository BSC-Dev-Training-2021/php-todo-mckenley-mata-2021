<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register
	</title>
	<?php 
	echo $_POST['password'];
	$var = 1;
	include 'connect.php' ;
	if (isset($_REQUEST['username'])) {
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($conn,$username);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn,$email);
		$password = stripslashes($_POST['password']);
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
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username','$password','$email', '$trn_date')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3></div>";
           mysqli_close($conn);
        }
	}

}

	?>
</head>
<body>
	<div>
		<h1>Register</h1>
		<form action="register.php" method="post">
			Username:<input type="text" name="username" placeholder="Username" required><br>
			Email:	<input type="email" name="email" placeholder="Email.." required><br>
			Password:<input type="text" name="password" placeholder="Enter your password" required>
			<input type="submit" name="submit" value="Register">
		</form>
		<a href="login.php"><button>Click here to login</button></a>
	</div>

</body>
</html>