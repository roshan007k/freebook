<?php
 $conn=new mysqli("localhost","root","","freebook");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST["button1"])) {
	$username=$_POST["username"];
	$password=$_POST["password"];
	if($username!="" && $password!=""){
	$result = $conn->query("SELECT username,password FROM login WHERE username='$username' AND password='$password'");
	$c=$result->num_rows;
	if($c > 0){

    	header('location: home.php');
	}
	else{
		echo "Please sign up first";	
	}
}
}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>FreeBook</title>
	<link rel="stylesheet" type="text/css" href="effects.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head>
<body>
	<header>
		<h3 class="header1"><a href="header.html" style="text-decoration: none; color: #11053c;"><span style="color: #f8f6fe;">Free</span>Books</a></h3>
		
	</header>
	<div style="background-color: #ffffff !important;">
		<div class="book">
			<img src="home5.jpg" alt="Book img">
		</div>
		<div class="signupform" style="background-color: transparent;">
			<form action="header.php" class="login1" method="post" style="background-image:url(big-eclipse.svg);font-family: 'Montserrat', sans-serif;">
		    <h1 align="center">LOGIN </h1>
		    <br><br>

		  
		    <div class="form1">
		    <label  for="username"><b>Username</b></label>
		    <input type="text" placeholder="Enter username" name="username"  id="username"required>
		    <br><br>
			</div>
			<div class="form2">
		    <label align="center" for="password"><b>Password</b></label>
		    <input align="center"  type="password" placeholder="Enter Password" name="password" id="password" required>
		    <br><br>
		    </div>
		    <div>
		      <button align="center" type="submit" class="button1" name="button1" onclick="validate1()" style="margin-left: 120px;">Log In</button>
		      <br><br>
		    </div>
		    <div>
		     <!-- <a align="center" href="index.html">Not Have a account? SIGN UP </a> -->
		     <h3 style="color: #8a948e;margin-top: 10px;">New to this website ? Sign up below</h3><br>
					<button class="button2" style="margin-left: 100px;"><a href="index.php"style="text-decoration: none;color: white !important;">SignUp</button></a>
		    </div>
		 
		 </div>
		   
		</form>
	</div>

<!-- 	<div class="signupform" style="background-color: grey;">
		<form style="background-image:url(big-eclipse.svg)" class="login1"> 

			<div class="form1">
			<label for="username">Username:</label><br>
			<input type="text" id="username" name="usrname" placeholder="Your Username"><br>
			</div>
			<div class="form2">
			<label for="password">Password:</label><br>
			<input type="password" id="password" name="password" placeholder="Your Password">
			</div><br>
			<button class="button1" onclick="validate1()"><a href="home.html" style="text-decoration: none;" >Log In</button></a>
				<h3 style="color: #8a948e;margin-top: 10px;">New to this website ? Sign up below</h3>
			<button class="button2"><a href="signup.html"style="text-decoration: none;" >Sign Up</button></a>
		</form>
	</div> -->
	</div>
<footer style="position: fixed">&copy;Copyright Inc.Terms and Conditions<br/>
</footer>
<script type="text/javascript" src="javascript1.js"></script>
</body>


</html>
