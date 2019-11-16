<?php
function component($productname, $productprice, $productimg, $product_id){
    $element="
	<div class=\"card\">
		<form action=\"home.php\" method=\"post\">
		<div class=\"image\">
		   <img src=\"$productimg\" alt=\"My Sample image\">
		</div>
		<div class=\"title\">
		 <h1>
		$productname</h1>
		</div>
		<div class=\"des\">
		 <p>
		You can Add Description Here...</p>
		<span class=\"prize\"><strong>$$productprice</strong></span><br>
		<button>Read More...</button>
		<button type=\"submit\" name=\"add\" style=\"margin-left: 10px;\">Add to cart</button>
		<input type=\"hidden\" name=\"product_id\" value=\"$product_id\">
		</div>
		</form>
	</div>
";
echo $element;
}
function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    	<div class=\"card\">
		<form action=\"home.php\" method=\"post\">
		<div class=\"image\">
		   <img src=\"$productimg\" alt=\"My Sample image\">
		</div>
		<div class=\"title\">
		 <h1>
		$productname</h1>
		</div>
		<div class=\"des\">
		 <p>
		You can Add Description Here...</p>
		<br>
		<span class=\"prize\"><strong>$$productprice</strong></span><br>
		<button>Read More...</button>
		<button type=\"submit\" name=\"add\" style=\"margin-left: 10px;\">Add to cart</button>
		<input type=\"hidden\" name=\"product_id\" value=\"$product_id\">
		</div>
		</form>
	</div>
    
    
    ";
    echo  $element;
}
?>