<?php
session_start();
include('conn.php');
require_once('component.php');

$database = new CreateDb("freebook","cart");
if (isset($_POST['add'])){
     ///print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'home.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>FreeBook.in</title>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

	<link rel="stylesheet" type="text/css" href="effects.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
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
				<a href="cart.php"><img src="cart.svg" alt="cart"></a><br>
				<?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
			</div>
			<div class="logout">
				<a href="header.php" style="text-decoration: none;margin-right: 40px; color: white !important;">Logout</a>
			</div>


	</header>

	<div class="home1">
		<div class="tag1">
			<h2 style="color: black;"><strong>Love to learn?</strong></h2>
			<h4 style="color: black;">Want books for free?</h4>
			<button class="button3"><a href="about.php"style="text-decoration: none;">Click here to know more</button></a>
		</div>
	</div>


<div class="card1" style="font-family: 'Montserrat', sans-serif !important; background-color: #ffffff !important;">
	<?php
	//echo phpversion();
	$result= $database->getData();
	while ($row=mysqli_fetch_assoc($result)) {
		component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
	}
	?>
	
</form>
</div>

	<footer style="position: relative;">&copy;Copyright Inc.Terms and Conditions<br/>
</footer>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>
</html>