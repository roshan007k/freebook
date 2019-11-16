<?php

$conn =new mysqli("localhost","root","","freebook");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['register-btn'])) {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $book1= $_POST['book1'];
    $book2= $_POST['book2'];
    $book3= $_POST['book3'];
    $book4= $_POST['book4'];
    $book5= $_POST['book5'];
    $pic1=addslashes($_FILES['pic1']['tmp_name']);
    $pic2=addslashes($_FILES['pic2']['tmp_name']);
    $pic3=addslashes($_FILES['pic3']['tmp_name']);
    $pic4=addslashes($_FILES['pic4']['tmp_name']);
    $name1=addslashes($_FILES['pic1']['name']);
    $name2=addslashes($_FILES['pic2']['name']);
    $name3=addslashes($_FILES['pic3']['name']);
    $name4=addslashes($_FILES['pic4']['name']);
    $pic1=file_get_contents($pic1);
    $pic1=base64_encode($pic1);
    $pic2=file_get_contents($pic2);
    $pic2=base64_encode($pic2);
    $pic3=file_get_contents($pic3);
    $pic3=base64_encode($pic3);
    $pic4=file_get_contents($pic4);
    $pic4=base64_encode($pic4);
  
    $sql2="INSERT INTO imageform(name1,pic1,pic2,pic3,pic4,name2,name3,name4)VALUES('$name1','$pic1','$pic2','$pic3','$pic4','$name2','$name3','$name4')";
    $imagesize1=getimagesize($_FILES['pic1']['tmp_name']);
    $imagesize2=getimagesize($_FILES['pic2']['tmp_name']);
    $imagesize3=getimagesize($_FILES['pic3']['tmp_name']);
    $imagesize4=getimagesize($_FILES['pic4']['tmp_name']);
      
    $sql = "INSERT INTO registrationform(username,email,password,address,book1,book2,book3,book4,book5)VALUES('$username','$email','$password','$address','$book1','$book2','$book3','$book4','$book5')";
    if (mysqli_query($conn,$sql)) {
        echo "Your regisration was successful";
        
    
    if(mysqli_query($conn,$sql2)) {
        
        header('location: thank.php');
    }
}
    else{
        echo "Connection error";
    }
    require 'PHPMailerAutoload.php';

    $mail= new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='freebookisroshan@gmail.com';
    $mail->Password='Freebook@1';
    $mail->setFrom($_POST['email']);
    $mail->addAddress($_POST['email']);
    $mail->addReplyTO($_POST['email'],$_POST['username']);
    $mail->isHTML(true);
    $mail->Subject='Form Submission';
    $mail->Body='<h1 align=centre>Name:'.$_POST['username'].'<br>Email: '.$_POST['email'].'<br></h1>';

    if (!$mail->send()) {
        echo "Something went wrong";
    }
    else{
        echo "Thanks for Donating!";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/8b0e50bfe8.js" crossorigin="anonymous"></script>

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">

    <!--Style-->
    <link rel="stylesheet" href="effects.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body style="background-color: #ffffff !important;">
    <header>
        <h3 class="header1"><a href="home.php" style="text-decoration: none;color: #11053c;"><span style="color: #f8f6fe;">Free</span>Book</a></h3>
        <nav>
                <ul class="nav-links">
                    <li><a class="nav-link" href="home.php">Home</a></li>
                    <li><a class="nav-link" href="about.php">About</a></li>
                    <li><a class="nav-link" href="products.php">Discussions</a></li>
                </ul>
            </nav>
            <div class="cart">
                <a href="cart.php"><img src="cart.svg" alt="cart"></a>
            </div>
            <div class="logout">
                <a href="header.php" style="text-decoration: none;margin-right: 50px; color: white !important;">Logout</a>
            </div>


    </header>
    <div style="color: #2f20df !important;">
    <div class="auth-content" style="margin-top: 200px auto; overflow: hidden; opacity: 0.9 !important; color:#231856;">
        <form action="registration.php"method="post" enctype="multipart/form-data">
            <h2 class="form-title">Register</h2>

            <!--<div class="msg error">
                <li>Username Required</li>
            </div> -->

            <div>
                <label>Username</label>
                <input type="text" name="username" class="text-input">
            </div>
            <div>
                <label>E-Mail</label>
                <input type="email" name="email" class="text-input">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" class="text-input">
            </div>
            <div>
                <label>Address</label>
                <textarea name="address" rows="4" cols="7" class="text-input"></textarea>
            </div>
            <div>
                <label>Upload Documents:</label><br>
                <input type="file"name="pic1" accept="image/*" required>
            </div>
            <div>
                <input type="file"name="pic2" accept="image/*"class="doc1" required>
            </div>
            <div>
                <input type="file"name="pic3" accept="image/*"class="doc2" required>
            </div>
            <div>
                <input type="file"name="pic4" accept="image/*"class="doc3" required>
            </div>
            <div>
                <label>Bookname 1</label>
                <input type="text" name="book1" class="text-input">
            </div>
            <div>
                <label>Bookname 2</label>
                <input type="text" name="book2" class="text-input">
            </div>
            <div>
                <label>Bookname 3</label>
                <input type="text" name="book3" class="text-input">
            </div>
            <div>
                <label>Bookname 4</label>
                <input type="text" name="book4" class="text-input">
            </div>
            <div>
                <label>Bookname 5</label>
                <input type="text" name="book5" class="text-input">
            </div>
            <div>
                <button type="submit" name="register-btn" class="btn btn-big" style="margin-left: 230px;">Submit</button>
            </div>
        </form>
    </div>
</div>

    <footer style="position: relative;">&copy;Copyright Inc.Terms and Conditions<br/>
</footer>

</body>
</html>

   
    