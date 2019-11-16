<?php

$conn =new mysqli("localhost","root","","freebook");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['register-btn'])) {
    $username=mysqli_real_escape_string($_POST['username']);
    $email=mysqli_real_escape_string($_POST['email']);
    $password=md5($_POST['password']);
    $address=mysqli_real_escape_string($_POST['address1']);
    $organization= mysqli_real_escape_string($_POST['organization']);
    $category=mysqli_real_escape_string($_POST['category']);
    $book1= mysqli_real_escape_string($_POST['book1']);
    $book2= mysqli_real_escape_string($_POST['book2']);
    $book3= mysqli_real_escape_string($_POST['book3']);
    $book4= mysqli_real_escape_string($_POST['book4']);
    $book5= mysqli_real_escape_string($_POST['book5']);
    $sql = "INSERT INTO donationform(username,email,password,address1,organization,category,book1,book2,book3,book4,book5)VALUES('$username','$email','$password','$address','$organization','$category','$book1','$book2','$book3','$book4','$book5')";
    if (mysqli_query($conn,$sql)) {
        header('location:thank.php');
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

// if (isset($_POST['registr-btn'])){
//     require 'mailer/PHPMailerAutoload.php';
//     $mail= new PHPMailer;
//     $mail->Host='smtp.gmail.com';
//     $mail->Port=587;
//     $maiil->SMTPAuth=true;
//     $mail->SMTPSecure='tls';
//     $mail->Username='roshankewat007@gmail.com';
//     $mail->Password='bleachroshan1';
//     $mail->setFrom($_POST['email']);
//     $mail->addAddress($_POST['email']);
//     $mail->addReplyTO($_POST['email'],$_POST['username']);
//     $mail->isHTML(true);
//     $mail->Subject='Form Submission';
//     $mail->Body='<h1 align=centre>Name:'.$_POST['username'].'<br>Email: '.$_POST['email'].'<br></h1>';

//     if (!$mail->send()) {
//         echo "Something went wrong";
//     }
//     else{
//         echo "Thanks for Donating!";
//     }
// }
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
    <script type="text/javascript" src="javascipt1.js"></script>
    <title>Register</title>
</head>
<body style="background: #ffffff !important;">
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
        <form action="donation.php" method="post">
            <h2 class="form-title">Donation Form</h2>

            <!--<div class="msg error">
                <li>Username Required</li>
            </div> -->

            <div>
                <label>Username</label>
                <input type="text" name="username" class="text-input" id="usern">
            </div>
            <div>
                <label>E-Mail</label>
                <input type="email" name="email" class="text-input" id="email">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" class="text-input" id="password">
            </div>
            <div>
                <label>Address</label>
                <textarea name="address1" rows="4" cols="7" class="text-input" id="address"></textarea>
            </div>
             <div>
                <label>Select Organization</label><br>
                <select name="organization" class="text-input" style="color: #231856 !important;font-family: 'Montserrat', sans-serif;">
                  <option value="Lal baug" >Lal Baug Central library</option>
                  <option value="Hospital" >Hiramungi Hospital</option>
                  <option value="xyz" >XYZ</option>
                  <option value="abc" >ABC</option>
                </select>
            </div>
            <div>
                <label>Book Category</label><br>
                <select name="category" class="text-input" style="color: #231856 !important;font-family: 'Montserrat', sans-serif;">
                  <option value="novel" >Novel</option>
                  <option value="Fiction" >Fiction</option>
                  <option value="fantasy" >Fantasy</option>
                  <option value="comic">Comic</option>
                </select>
            </div>
            
            <div>
                <label>Bookname 1</label>
                <input type="text" name="book1" class="text-input">
            </div>
            <div>
                <label>Bookname</label>
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
                <button type="submit" name="register-btn" class="btn btn-big" onsubmit ="validate1()" style="margin-left: 230px;">Submit</button>
            </div>
        </form>
    </div>
</div>

 

    <!-- JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
   
    		

    <!--Custom Script-->
    <footer style="position: relative;">&copy;Copyright Inc.Terms and Conditions<br/>
</footer>


</body>
</html>