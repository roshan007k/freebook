<?php
$conn=new mysqli("localhost","root","","freebook");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST["signupbtn"])) {
	$username=$_POST["username1"];
	$password=md5($_POST["password"]);
	$email=$_POST["email"];
	$repeatpassword=md($_POST["psw-repeat"]);
	$result = $conn->query("SELECT email,password FROM login WHERE email='$email' AND password='$password'");
	$c=$result->num_rows;
	if ($c<=0) {
		if($username!="" && ($password==$repeatpassword)){
			$sql = "INSERT INTO login(username,password,email,repeatpassword) VALUES ('$username','$password','$email','$repeatpassword')";
		}
		if ($conn->query($sql) === TRUE && $c==0) {
    	echo "<h6>New record created successfully<h6>";
		}

	}
	elseif ($username=="" || $password==""|| $repeatpassword=="" ||  $email=="") {
		echo "Please fill the details";
	}
	else{
			echo "<h6>Email Id already registered</h6>";
			
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
	<div class="book">
		<img src="home5.jpg" alt="Book img">
	</div>
	<form action="index.php" method="post" class="login1"style="background-image:url(big-eclipse.svg); margin-top: 50px; font-family: 'Montserrat', sans-serif;">
  
  
    <h1 style="margin-left: 130px;">Sign Up</h1>
    <br><br>
    <p>Please fill in this form to create an account.</p>
    <br><br>
  
<table>
	<tr>
        
    <td><label for="text">Username</td>
    <td><input type="text" placeholder="Enter Username" name="username1" id="username" class="user"></td>
    

</tr>
    <tr>
        
    <td><label for="email">Email:</label></td>
    <td><input type="text" placeholder="Enter Email" name="email" id="username" class=""></td>
    

</tr><tr>
    <td><label for="psw">Password:</label></td>
    <td><input type="password" placeholder="Enter Password" name="password" id="username" ></td>
    </tr>
   
<tr>
    <td><label for="psw-repeat">Repeat Password:</label></td>
    <td><input type="password" placeholder="Repeat Password" name="psw-repeat" id="username" ></td>
    </tr>
    </table>
    <br><br>

    <div>
      <button type="submit" class="button1" name="signupbtn" onsubmit=" return validate()" style="margin-left: 130px;">Sign Up</button>
      <script>
      	function validate() {
      		var x=document.getElementByClassName('user');
      		if (x=="") {
      			alert("Please enter the user name");
      			console.log("hello1");
      		}
      	}
      </script>
    </div>
    <br><br>
    <div>
     <h4 style="text-decoration: none; margin-left: 80px;">Have a account?<br><a href="header.php" style="text-decoration: none;margin-left: 60px;">Login </h4>
     <br><br>
    </div>
  </div>
 
</form>
<footer style="position: fixed">&copy;Copyright Inc.Terms and Conditions<br/>
</footer>
</body>


</html>