<?php
	if (isset($_POST['submit'])) {
		$name=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$address=$_POST['address1'];
		$organization=$_POST['organization'];
		$category=$_POST['category'];
		$book1=$_POST['book1'];
		$book2=$_POST['book2'];
		$book3=$_POST['book3'];
		$book4=$_POST['book4'];
		$book5=$_POST['book5'];
		$subject='Form Submission';
		$message="Name :".$name."\n"."Phone :".$phone."\n"."Wrote the following :"."\n\n";
		$headers="From: ".$email;
		if(mail($email, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
		}
		else{
			echo "Something went wrong!";
		}

	}

?>