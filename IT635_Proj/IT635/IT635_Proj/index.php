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

	<div class="main_wrapper">

		<!-- Header starts here -->

		<div class="header_wrapper"> </div>
		<!-- Header ends here -->
		<!-- Navigation Bar starts here -->

		<div class="menubar">  

			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="myaccount.php">My Account</a></li>
				<li><a href="#">Sign up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			
			<ul>
		

		<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="search a product" />
				<input type="submit" name="search" value="Search" />
			</form>
		</div>

		<!-- Navigation Bar ends here -->

		<!-- Content layout starts here-->

		<div class="content_wrapper" style="text-align:left;">

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
		<?php cart(); ?>
		
			<div id="shopping_cart">
			
				<span style="float:right; color:white; font-size:18px; padding:5px; line-height:40px;"	>Welcome! <b style="color:yellow">Shopping Cart:</b> Total Items: Total Price: <a href="cart.php">Take me to Cart</a>
				
				</span>
				
			
			
			</div>
			
			<div id="products_box">
			
			<?php getProd(); ?>
			<?php getCatPro(); ?>
			<?php getBrandPro(); ?>
				
			</div>


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
