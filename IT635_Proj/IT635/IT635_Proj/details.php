<!DOCTYPE>

<?php

include ('functions/function.php');


?>

<html>
	<head>
		<title> TechShop </title>

	<link rel="stylesheet" href="style_CSS/style.css" media="all" />
	</head>

<body>

	<!-- Main layout starts from here -->

	<div class="main_layout">

		<!-- Header starts here -->

		<div class="header_wrapper"> </div>
		<!-- Header ends here -->
		<!-- Navigation Bar starts here -->

		<div class="menubar">  

			<ul id="menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">All Products</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Sign up</a></li>
				<li><a href="#">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			
			<ul>
		

		<div id="form">
			<form method="get" action="results.php enctype="multipart/form-data">
				<input type="text" name="user_name" placeholder="search a produt" />
				<input type="submit" name="search" value="Search" />
			</form>
		</div>

		<!-- Navigation Bar ends here -->

		<!-- Content layout starts here-->

		<div class="content_layout" style="text-align:left;">

	<div id="sidebar">

		<div id="sidebar_title">Categories</div>
			
			<ul id="categ">
				
				<?php getCateg(); ?>

			<ul>

			<div id="sidebar_title">Brands</div>

			<ul id="categ">

				<?php getBrands(); ?>
			<ul>

	 </div>
</div>
		<div id="content_area"> 
		
			<div id="shopping_cart">
			
				<span style="float:right; color:white; font-size:18px; padding:5px; line-height:40px;"	>Welcome! <b style="color:yellow">Shopping Cart:</b> Total Items: Total Price: <a href="cart.php">Take me to Cart</a>
				
				</span>
				
			
			
			</div>
			
				<?php
				
				if(isset($_GET['prod_id'])){
					
					$product_id = $_GET['prod_id'];
				
				$get_prod= "select * from Products where product_id='$product_id' ";
		
		$run_prod= mysqli_query($con, $get_prod);
		
		while($row_prod=mysqli_fetch_array($run_prod)){
			
				$prod_id = $row_prod['product_id'];
				$prod_title = $row_prod['product_title'];
				$prod_price = $row_prod['product_price'];
				$prod_image = $row_prod['product_image'];
				$prod_desc = $row_prod['product_desc'];
				
				echo "
				
					<div id='single_product'>
					
								<h3>$prod_title</h3>
								
								<img src='Admin/product_img/$prod_image' width='400' height='300' />
								
								<p> <b>$ $prod_price </b> </p>
								
								<p> <b>$prod_desc </b> </p>
					
								<a href='index.php' style='float:left; color:red;'>Go Back</a>
								
								<a href='index.php?prod_id=$prod_id'><button style='float:right;'>Add to Cart </button></a>
					</div>	"	;	
}

				}
				
				?>
				
			


		</div>

</div>
		<!-- Content layout ends here -->


			<div id="footer"> 

			<h2 style="text-align:center; padding-top:30px;">&copy; 2017 by https://www.w3schools.com/</h2>


			 </div>

	

</div>

<!-- Main container ends here -->


</body>

</html>
