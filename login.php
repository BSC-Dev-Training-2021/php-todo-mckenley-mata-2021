<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login-form.css">
	<title>Login</title>
	
</head>
<?php      
    include('connect.php');  
    
      
        //to prevent from mysqli injection  
        $username = stripcslashes($_POST['username']);  
        $password = stripcslashes($_POST['password']);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: home.php");
    		exit;
        }  
        else{  
            echo '<script>alert("Invalid Password!")</script>'; 
        }     
?>  
<body>
<div class="container">
	<div>
		<img class="login-logo" src="https://i.dlpng.com/static/png/6342390_preview.png">
	</div>
	<div class="login-name">
		<br>
		<form method="post" action="" name="Login">
			<h5 class="sam">Email<br><input class="txt-design" type="text" name="username" ></h5>
			<h5 class="sam">Password<br><input class="txt-design" type="Password" name="password" ></h5>
			<input type="submit" name="submit" value="Login">
	</div>
	<div class="separator">
	</div>
	<div class="connect" >
		<button class="btn-fb"><i class="fab fa-facebook-square"></i> Facebook</button>
		<br>
		<br>
		<button class="btn-google"><i class="fab fa-google"></i> Gooogle</button>
		<br>
		<br>
		<button class="btn-apple"><i class="fab fa-apple"></i> Apple</button>
		<br>
		<br>
		<a href="register.php">Click here to register</a>
	</div>
	
	
</div>


</body>
</html>